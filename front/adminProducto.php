<?php require_once '../back/adminProductoBack.php' ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de productos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">

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
                        <a class="nav-link text-light" href="front/cesta.php"> <img src="../img/cesta1.png" alt="" style="width: 25px;"> </a>
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
    <div class="container mt-4">
        <div class="row">
            <h1>Administracion de productos</h1>
        </div>
    </div>
    <div class="container" style="display: flex;">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-ms-12">
                <?php
                if (isset($_SESSION['mensaje'])) :
                ?>
                    <div class="alert alert-<?= $_SESSION['tipo-mensaje'] ?> col-lg-12">
                        <?php

                        echo $_SESSION['mensaje'];
                        unset($_SESSION['mensaje']);
                        ?>

                    </div>
                <?php endif ?>
                <?php


                ?>


                <table class="table table-dark" style="font-size: 11px">
                    <form action="../back/adminProductoBack.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <thead>
                            <tr>
                                <th>Categoria</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Imagen</th>
                                <th>Stock</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <select name="categoria">
                                        <?php
                                        $conect = allCategorias($conexion);
                                        while ($row = $conect->fetch_assoc()) {
                                        ?>
                                            <option name="categoria" value="<?php echo $row['id_categoria']; ?>">
                                                <?php echo $row['nombre_cat']; ?>
                                            </option>
                                        <?php } ?>

                                    </select>

                                </th>

                                <th><input type="text" name="nombre" placeholder="Introduce el nombre" value="<?php echo $nombre ?>"> </th>
                                <th><input type="text" name="descripcion" id="" placeholder="Introduce la descripcion" value="<?php echo $descripcion ?>"></th>
                                <th><input type="text" name="precio" placeholder="Introduce el precio" value="<?php echo $precio ?>"></th>
                                <th><input type="text" name="imagen1" id="" placeholder="Introduce el nombre de la imagen" value="<?php echo $imagen1 ?>"></th>
                                <th><input type="text" name="stock" id="" placeholder="Introduce el Stock" value="<?php echo $stock ?>"></th>

                                <?php if ($editar == true) {

                                ?>
                                    <th><button type="submit" name="editar" class="btn btn-info">Editar</button></th>

                                <?php } else { ?>

                                    <th><button type="submit" name="save" class="btn btn-primary">Añadir</button></th>
                                <?php } ?>
                            </tr>

                        </tbody>
                    </form>
                    <?php
                    $resultado = allProductos($conexion);
                    while ($row = $resultado->fetch_assoc()) {
                    ?>
                        <form action="../back/adminProductoBack.php" method="POST">
                            <tbody>
                                <tr>
                                    <th>
                                        <select>
                                            <?php
                                            $conect = allCategorias($conexion);
                                            while ($row2 = $conect->fetch_assoc()) {
                                            ?>
                                                <?php if ($row['id_categoria'] == $row2['id_categoria']) {
                                                ?>
                                                    <option value="<?php echo $row2['id_categoria']; ?>" selected>
                                                        <?= $row2['nombre_cat'] ?>
                                                    </option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $row2['id_categoria']; ?>">
                                                        <?php echo $row['nombre_producto']; ?>
                                                    </option>
                                                <?php } ?>
                                            <?php } ?>

                                        </select>
                                    </th>
                                    <th><?php echo $row['nombre_producto']; ?></th>
                                    <th><?php echo $row['descripcion_producto']; ?></th>
                                    <th><?php echo $row['precio_producto']; ?></th>
                                    <th><?php echo $row['imagen1_producto']; ?></th>
                                    <th><?php echo $row['stock_producto']; ?></th>
                                    <th>
                                        <a href="adminProducto.php?edit=<?php echo $row['id_producto'] ?>" class="btn btn-info">Editar</a>
                                        <a href="../back/adminProductoBack.php?elimi=<?php echo $row['id_producto'] ?>" class="btn btn-danger" onclick="return confirmDelet()">Eliminar</a>
                                    </th>
                                </tr>

                            </tbody>
                        </form>
                    <?php } ?>

                </table>

            </div>
        </div>
    </div>
    <!-- El footer de la pagina -->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                <hr>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom: 100px; background-color: #f3f2f7;">

        <div class="col-md-2">

        </div>
        <div class="col-md-2  col-sm-8 col-xs-12 mt-5 ">
            <strong>
                <h5 class="mb-4" style="color: black;">CUENTA</h5>
            </strong>
            <p><a class="text-dark" href="myCuenta.php">Mi Cuenta</a></p>
            <p><a class="text-dark" href="registrar.php">Registrar</a></p>
            <p><a class="text-dark" href="login.php">Login</a></p>
        </div>
        <div class="col-md-2 col-sm-8 col-xs-12 mt-5 ">
            <strong>
                <h5 class="mb-4">ASISTENCIA</h5>
            </strong>
            <p><a class="text-dark" href="">Términos y condiciones</a></p>
            <p><a class="text-dark" href="">Políticas de privacidad</a></p>
            <p><a class="text-dark" href="">Políticas de devoluciones</a></p>
            <p><a class="text-dark" href="">Politicas de suscripción</a></p>
        </div>
        <div class="col-md-2 mt-5 col-sm-8 col-xs-12 ">
            <strong>
                <h5 class="mb-4">ACERCA DE FUNKO</h5>
            </strong>
            <p><a class="text-dark" href="">Sobre nosotras</a></p>
            <p><a class="text-dark" href="">Funko blog</a></p>
            <p><a class="text-dark" href="">Ubicación</a></p>
            <p><a class="text-dark" href="">Noticias</a></p>
        </div>
        <div class="col-md-3 mt-5 col-sm-8 col-xs-12">
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
    <div class="row" style="display: flex; justify-content: center;">
        <img src="../img/iconoIdiomaN.png" alt="" width="25px;"><span>España</span>
    </div>
    <div class="mt-3" style="display: flex; justify-content: center;">
        <p class="text-dark">Todos los derechos reservados</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>