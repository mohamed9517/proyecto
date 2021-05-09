<?php
include_once('bd/DAOCategoria.php');
include_once('bd/conexion.php');
include_once('bd/DAOProducto.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Funko Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/indexcss.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: black;" style="width: 90%;">
        <div class="container-fluid">
            <a class="navbar-brand text-light mr-2 " href="#"><img src="img/LogoF16.png" alt="logo ArtFunko" style="height: 40px; width: 60px;"> </a>
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
                        <a class="nav-link active text-light" aria-current="page" href="front/myCuenta.php"><img src="img/iconologin.png" alt="" style="width: 25px;"></a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link text-light" href="#"><img src="img/cesta1.png" alt="" style="width: 25px;"><span class="badge badge-danger">1</span></a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link text-light" href="#"><img src="img/iconoIdioma2.png" alt="" style="width: 25px;"></a>
                    </li>
                </ul>
            </div>

        </div>

    </nav>



    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-10 " style="background-color: #1c2c5c;">
                <div class="row">


                    <div class="col-md-8 col-sm-12 col-xm-12">
                        <p style="margin-top: 0px;  color: white;" class="mt-5">GET READY</p>
                        <h1 style="font-size: 60px; color: white;"> <strong> AHORRA 15% EN <br> FIGURAS DE JOHN WICK</strong></h1>
                        <p class="mb-4" style="color: white;">
                            De la colección John Wick, John in Black Suit w/ Dog como figura de vinilo POde Funko; la figura mide 9 cm <br> Y se envía en una caja ilustrada con ventana descúbre otras figuras de la colección John Wick y colecciónalas todas </p>

                        <button type="button" class="btn p-2 mt-5" style="border-radius: 20px; background-color: white; color: black;"><strong>SHOP COLLECTION</strong></button>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xm-12" style="display: flex; justify-content: center;">
                        <img class="mt-2" src="img/funko.png" alt="" style="width: 350px;">
                    </div>

                </div>

            </div>
            <div class="col-md-1">


            </div>

        </div>

    </div>





    <!-- Mostrar las las categoris-->
    <div class="container-fluid">
        <div class="row">

            <?php
            $resultado = allCategorias($conexion);
            while ($fila = mysqli_fetch_array($resultado)) {

            ?>
                <div class=" col-sm-1.7 col-xm-1.7 card mr-1 mt-1 mb-1" style="width: 13rem;">
                    <img class="card-img-top" src="img/<?php echo $fila['imgane_cat']; ?>" alt="Card image cap">
                </div>

            <?php } ?>
        </div>
    </div>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-6 col-sm-12 bg-primary">
                <div class="row">
                    <div class="col-md-12 " style="">
                        <div class="row">

                            <div class="col-md-4 col-sm-12 col-xm-12" style="display: flex; justify-content: center;">
                                <img class="mt-2" src="img/imgProductos/nba.png" alt="" style="width: 230px;">
                            </div>

                            <div class="col-md-5 col-sm-12 col-xm-12" style="display: flex; align-items: center;">
                                <div>
                                    <p style="margin-top: 0px;  color: white;"> <strong>LAS FIGURAS MAS VENDIDAS </strong> </p>
                                    <button type="button" class="btn " style="border-radius: 20px; background-color: white; color: black;"><strong>SHOP COLLECTION</strong></button>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <div class="col-md-6 col-sm-12 bg-danger">
                <div class="row">
                    <div class="col-md-12 " style="">
                        <div class="row">
                            <div class="col-md-8 col-sm-12 col-xm-12" style="display: flex; align-items: center;">
                                <div>
                                    <p style="margin-top: 0px;  color: white;"> <strong>LAS NUEVAS FIGURAS </strong> </p>

                                    <button type="button" class="btn" style="border-radius: 20px; background-color: white; color: black;"><strong>SHOP COLLECTION</strong></button>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12 col-xm-12" style="display: flex; justify-content: center;">
                                <img class="mt-2" src="img/imgProductos/starWors.png" alt="" style="width: 230px;">
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="container-fluid mt-2">
        <div class="row">
            <strong>
                <h2>UlTIMOS PRODUCTOS</h2>
            </strong>
        </div>
        <div class="row">

            <?php
            $resultado =  allProductosLimit($conexion);
            while ($fila = mysqli_fetch_array($resultado)) {

            ?>

                <div class="card col-md-3 col-sm-6 col-xm-6 mt-2" style="width: 18rem;">
                    <img class="card-img-top" src="img/imgProductos/<?php echo $fila['imagen1_producto']; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $fila['nombre_producto'] ?></h5>
                        <p class="card-text">$<?php echo $fila['precio_producto'] ?></p>
                        <a href="front/descripcionProducto.php?id=<?php echo $fila['id_producto'] ?>" class="btn  col-md-12 rounded border" style="background-color: #f3f2f7;">Ver detalles</a>
                    </div>
                </div>
            <?php } ?>

        </div>

    </div>
    <!-- Redes sociales -->
    <div class="container-fluid mt-5" style="background-color: black;">
        <div class="row">

            <div class="col-md-3">
                <img src="img/facebook.png" alt="" style="width: 80px;">
                <img src="img/instagram.png" alt="" style="width: 70px;">
                <img src="img/twitter.png" alt="" style="width: 60px;">

            </div>
            <div class="col-md-9">

            </div>

        </div>

    </div>
    
    <!-- El footer -->
    <div class="container" style="background-color: blanchedalmond;">
        <div class="row">
            <div class="col-md-3">
                <strong>
                    <h5>CUENTA</h5>
                </strong>
            </div>
            <div class="col-md-3">
                <strong>
                    <h5>ASISTENCIA</h5>
                </strong>
            </div>
            <div class="col-md-3">
                <strong>
                    <h5>ACERCA DE FUNKO</h5>
                </strong>
            </div>
            <div class="col-md-3">
                <strong>
                    <h5>CONÉCTATE CON NOSOTROS</h5>
                </strong>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>