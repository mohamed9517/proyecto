<?php
include_once('../bd/DAOUsuario.php');
require_once('../bd/DAOCategoria.php');
include_once('../bd/conexion.php');
session_start();
if (!isset($_GET['edit'])) {

    header('Location:../index.php');
}
$id=$_GET['edit'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Modificar datos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/indexcss.css">
    <link rel="icon" type="image/png" href="../img/funkopng.png" />

</head>

<body style="background-color: #f3f2f7;">
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: black;" style="width: 90%;">
        <div class="container-fluid">
            <a class="navbar-brand text-light mr-2 " href="#"><img src="../img/LogoF16.png" alt="logo ArtFunko" style="height: 40px; width: 60px;"> </a>
            <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            <div class="collapse navbar-collapse col-lg-7" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item dropdown mr-2">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <strong>PRODUCTOS</strong>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li>
                                <a class="dropdown-item" href="allProductos.php"> All </a>
                            </li>
                            <?php
                            $resultado = allCategorias($conexion);
                            while ($row = mysqli_fetch_array($resultado)) {
                            ?>
                                <li>
                                    <a class="dropdown-item" href="filtroCategoria.php?id=<?php echo $row['id_categoria'] ?>"> <?php echo $row['nombre_cat']; ?> </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown mr-2 ">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <strong> DESTACADOS</strong>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="nuevos.php">Ultimos añadidos</a></li>
                            <li><a class="dropdown-item" href="enStock.php">En stock</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse col-lg-3" id="navbarScroll" style="width: 100%;">
                <form class="d-flex mr-2">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" style="border-radius: 20px; width: 200px;">
                </form>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <?php if (isset($_SESSION['id_usuario'])) {
                    ?>
                        <li class="nav-item mr-2 ">
                            <a class="nav-link active text-light" aria-current="page" href="myCuenta.php"><img src="../img/funkopng.png" alt="" style="width: 30px;"></a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item mr-2">
                            <a class="nav-link active text-light" aria-current="page" href="login.php"><img src="../img/login001.png" alt="" style="width: 25px;"></a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="cesta.php"> <img src="../img/cesta1.png" alt="" style="width: 25px;"> </a>
                    </li>
                    <li class="nav-item mr-2">
                        <span style="color: white;"><?php
                                                    if (isset($_SESSION['cesta'])) {
                                                        echo count($_SESSION['cesta']);
                                                    } else {
                                                    }

                                                    ?></span>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link text-light" href="#"><img src="../img/iconoIdioma2.png" alt="" style="width: 25px;"> </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-2">
        <div class="row">


            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style="text-decoration: none; color: black; " href="../index.php">Home</a></li>
                    <li class="breadcrumb-item"><a style="text-decoration: none; color: black; " href="#">Mi cuenta</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar datos</li>
                </ol>
            </nav>
        </div>
    </div>


    <?php
    // Consulta al usuario seleccionando segun el id de la session, en caso de no exite 
    $id = $_GET['edit'];
    $resultado = MostrarU($conexion, $id);

    ?>
    <?php
    while ($row = $resultado->fetch_assoc()) {
    ?>
        <div class="container mt-2 ">
            <div class="row">
                <h2>Editar perfil</h2>
            </div>
        </div>
        <div class="container shadow" style="background-color: white;">
            <div class="row">

                <div class="col-4 col-sm-4 ">
                    <form method="POST" action="../back/modificarDatosClienteBack.php">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <strong><label>Usuario</label></strong>
                            <input type="text" name="usua" class="form-control" placeholder="<?php echo $row['usuario'] ?>" value="<?php echo $row['usuario'] ?>">
                        </div>
                        <div class="form-group">
                            <strong><label>Nombre</label></strong>
                            <input type="text" class="form-control" name="nombre" placeholder="<?php echo $row['nombre'] ?>" value="<?php echo $row['nombre'] ?>">
                        </div>
                        <div class="form-group">
                            <strong><label>Primer apellido</label></strong>
                            <input type="text" class="form-control" name="apellido1" placeholder="<?php echo $row['apellido1'] ?>" value="<?php echo $row['apellido1'] ?>">
                        </div>
                        <div class="form-group">
                            <strong><label>Segundo apellido</label></strong>
                            <input type="text" class="form-control" name="apellido2" placeholder="<?php echo $row['apellido2'] ?>" value="<?php echo $row['apellido2'] ?>">
                        </div>
                        <div class="form-group">
                            <strong><label>Email</label></strong>
                            <input type="text" class="form-control" name="email" placeholder="<?php echo $row['email'] ?>" value="<?php echo $row['email'] ?>">
                        </div>
                        <div class="text-center">
                            <button name="editar" type="submit" class="btn btn-primary mb-1" style="background-color: #f3f2f7; color: black;">Guardar cambios</button>
                        </div>

                    </form>
                </div>
                <div class="col-8 col-sm-8 text-center">
                    <img src="../img/funko.png" alt="" style="height: 500px;">
                    <p> <a href="eliminarUsuario.php?id=<?php echo $id; ?>" class="btn"> ELIMINAR CUENTA </a></p>
                </div>

            </div>
        </div>
    <?php } ?>
    <!-- Footer -->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                <hr>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row" style="margin-bottom: 100px;">
            <div class="col-md-2">
            </div>
            <div class="col-md-2  mt-5 ">
                <strong>
                    <h5 class="mb-4" style="color: black;">CUENTA</h5>
                </strong>
                <p><a class="text-dark" href="myCuenta.php">Mi Cuenta</a></p>
                <p><a class="text-dark" href="registrar.php">Registrar</a></p>
                <p><a class="text-dark" href="login.php">Login</a></p>
            </div>
            <div class="col-md-2 mt-5 ">
                <strong>
                    <h5 class="mb-4">ASISTENCIA</h5>
                </strong>
                <p><a class="text-dark" href="">Términos y condiciones</a></p>
                <p><a class="text-dark" href="">Políticas de privacidad</a></p>
                <p><a class="text-dark" href="">Políticas de devoluciones</a></p>
                <p><a class="text-dark" href="">Politicas de suscripción</a></p>
            </div>
            <div class="col-md-2 mt-5 ">
                <strong>
                    <h5 class="mb-4">ACERCA DE FUNKO</h5>
                </strong>
                <p><a class="text-dark" href="">Sobre nosotras</a></p>
                <p><a class="text-dark" href="">Funko blog</a></p>
                <p><a class="text-dark" href="">Ubicación</a></p>
                <p><a class="text-dark" href="">Noticias</a></p>
            </div>
            <div class="col-md-3 mt-5 ">
                <strong>
                    <h5 class="mb-4">CONÉCTATE CON NOSOTROS</h5>
                </strong>
                <p><a class="text-dark" href="">Twitter</a></p>
                <p><a class="text-dark" href="">Facebook</a></p>
                <p><a class="text-dark" href="">Instagram</a></p>
                <p><a class="text-dark" href="">Youtube</a></p>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div>
            <div class="row" style="display: flex; justify-content: center;">
                <img src="../img/iconoIdiomaN.png" alt="" width="25px;"><span>España</span>
            </div>
            <div class="mt-3" style="display: flex; justify-content: center;">
                <p class="text-dark">Todos los derechos reservados</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>