<?php
include_once('../bd/DAOCategoria.php');
include_once('../bd/conexion.php');
include_once('../bd/DAOProducto.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Funko Home</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/indexcss.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: black;" style="width: 90%;">
        <div class="container-fluid">
            <a class="navbar-brand text-light mr-2 " href="#"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse col-lg-7" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item dropdown mr-2">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <strong>PRODUCTOS</strong>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">

                            <?php
                            $resultado = allCategorias($conexion);
                            while ($row = mysqli_fetch_array($resultado)) {
                            ?>
                                <li>

                                    <a class="dropdown-item" href="front/filtroCategoria.php?id=<?php echo $row['id_categoria'] ?>"> <?php echo $row['nombre_cat']; ?> </a>

                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown mr-2 ">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <strong> DESTACADOS</strong>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <div class="collapse navbar-collapse col-lg-3" id="navbarScroll" style="width: 100%;">
                <form class="d-flex mr-3">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="border-radius: 20px; width: 190px;">

                </form>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item mr-3 ">
                        <a class="nav-link active text-light" aria-current="page" href="front/myCuenta.php"><img src="../img/iconologin.png" alt="" style="width: 25px;"></a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link text-light" href="#"><img src="../img/cesta1.png" alt="" style="width: 25px;"></a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link text-light" href="#"><img src="../img/iconoIdioma2.png" alt="" style="width: 25px;"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            <?php
            $id = $_GET['id'];
            $resultado = consultaCategoria($conexion, $id);
            while ($row = mysqli_fetch_array($resultado)) {
            ?>
                <div class="col-12 bg-primary mt-5 mb-3 h-75">

                    <h2>Funkos de <?php echo $row['nombre_cat'] ?></h2>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
                <?php
                $id = $_GET['id'];
                $resultado = consultaProductoCategoria($conexion, $id);
                while ($row = mysqli_fetch_array($resultado)) {
                ?>
                    <div class="card col-md-3 m-1" style="width: 18rem;">
                        <img class="card-img-top" src="../img/imgProductos/<?php echo $row['imagen1_producto']; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nombre_producto'] ?></h5>
                            <p class="card-text">$<?php echo $row['precio_producto'] ?></p>
                            <a href="descripcionVideojuego.php?id=" class="btn  col-md-12 rounded border" style="background-color: #f3f2f7;">Ver detalles</a>
                        </div>
                    </div>
                <?php } ?>
            
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>