<?php

include_once('../bd/DAOCategoria.php');
include_once('../bd/conexion.php');
include_once('../bd/DAOProducto.php');
session_start();
$id = $_GET['id'];
if (isset($_POST['save'])) {
    $uID = $conexion->real_escape_string($_POST['uID']);
    $ratedIndex = $conexion->real_escape_string($_POST['ratedIndex']);
    
    $ratedIndex++;

    if (!$uID) {
        $conexion->query("INSERT INTO stars (rateIndex, idp) VALUES ('$ratedIndex','$id')");
        $sql = $conexion->query("SELECT id FROM stars ORDER BY id DESC LIMIT 1 WHERE idp=$id");
        $uData = $sql->fetch_assoc();
        $uID = $uData['id'];
    } else
        $conexion->query("UPDATE stars SET rateIndex='$ratedIndex' WHERE id='$uID' and idp=$id");

    exit(json_encode(array('id' => $uID)));
}


$sql = $conexion->query("SELECT id FROM stars  WHERE idp=$id ");
$numR = $sql->num_rows;

$sql = $conexion->query("SELECT SUM(rateIndex) AS total FROM stars  WHERE idp=$id");
$rData = $sql->fetch_array();
$total = $rData['total'];

$avg = $total / $numR;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Funko Home</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/indexcss.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>

<body style="background-color: #f3f2f7;">
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
                        <a class="nav-link text-light" href="#"><img src="../img/cesta1.png" alt="" style="width: 25px;"><span style="float:right"><?php
                        if(isset($_SESSION['cesta'])){
                            echo count($_SESSION['cesta']);
                        }else{
                            echo 0;
                        }
                        
                        ?></span></a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link text-light" href="#"><img src="../img/iconoIdioma2.png" alt="" style="width: 25px;"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php 

    $idf = $_GET['id'];
    
    ?>
    <div class="container mt-1">
        <div class="row">
            <div aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" style="color: black; text-decoration: none;"><a href="#">Home</a></li>
                    <?php
                    $id = $_GET['id'];
                    $resultado = consultaCategoria($conexion, $id);
                    while ($row = mysqli_fetch_array($resultado)) {
                    ?>
                        <li class="breadcrumb-item"><a href="#"><?php echo $row['nombre_cat'] ?></a></li>
                    <?php } ?>
                    <?php
                    $id = $_GET['id'];

                    $resultado = consultaProducto($conexion, $id);
                    while ($row = mysqli_fetch_array($resultado)) {
                    ?>


                        <li class="breadcrumb-item"><a href="#"><?php echo $row['nombre_producto']  ?></a></li>

                    <?php }  ?>

                </ol>
            </div>
        </div>
    </div>
   

    <div class="container-fluid">

        <div class="row">

        <div class="col-md-1"></div>



            <?php
            $id = $_GET['id'];

            $resultado = consultaProducto($conexion, $id);
            while ($row = mysqli_fetch_array($resultado)) {
            ?>

                <div class="col-md-5 " style="background-color: #f3f2f7; display: flex; align-items: center;">
                    <div class="col-md-12 shadow-lg">
                        <div class="col-md-12" style="display: flex; justify-content: center;">
                            <img src="../img/imgProductos/<?php echo $row['imagen1_producto']  ?>" alt="">
                            <hr>
                        </div>
                        

                    </div>

                </div>
            <?php }  ?>






            <div class="col-md-6  " style="background-color: #f3f2f7;">
                <?php
                $id = $_GET['id'];
                $resultado = consultaProducto($conexion, $id);
                while ($row = mysqli_fetch_array($resultado)) {
                ?>
                    <div class="col-md-12 " style="display: flex; align-items: center; margin-top: 100px;">
                        <div class="col-md-12">
                            <h1 class="mt-1" style="font-size: 60px; border:solid balck 1px;"><strong><?php echo $row['nombre_producto']  ?></strong></h1>
                            <div>
                                <i class="fa fa-star " data-index="0"></i>
                                <i class="fa fa-star " data-index="1"></i>
                                <i class="fa fa-star " data-index="2"></i>
                                <i class="fa fa-star " data-index="3"></i>
                                <i class="fa fa-star " data-index="4"></i>
                                <br>
                                <p class="mt-1" style="color: black; font-size: 10px;"> <strong> La puntuacion es <?php echo round($avg, 2) ?> del 5 </strong></p>
                            </div>
                            <h3 class="mt-1" style="font-size: 40px;">$<?php echo $row['precio_producto']  ?></h3>
                            <a href="cesta.php?id=<?php echo $row['id_producto'] ?>" class="btn rounded border p-2.5 mt-4 submit2" style="background-color: white; color: black; width: 200px;">Añadir a la cesta</a>

                        <?php }  ?>
                        </div>
                    </div>
            </div>
        </div>



        <div class="container-fluid mt-4">
            <div class="row">

                <h2 style="color: black; font-weight: 30px;">UlTIMOS PRODUCTOS</h2>

            </div>
            <div class="row">

                <?php
                $resultado =  allProductosLimit1($conexion);
                while ($fila = mysqli_fetch_array($resultado)) {

                ?>

                    <div class="card col-md-3 col-sm-6 col-xm-6 mt-2 mr-1" style="width: 18rem;">
                        <img class="card-img-top" src="../img/imgProductos/<?php echo $fila['imagen1_producto']; ?>" alt="Card image cap">
                        <div class="card-body">
                            <input type="hidden" class="id" value="<?php echo $fila['id_producto'] ?>">
                            <h5 class="card-title"><?php echo $fila['nombre_producto'] ?></h5>
                            <p class="card-text">$<?php echo $fila['precio_producto'] ?></p>
                            <a href="descripcionProducto.php?id=<?php echo $fila['id_producto'] ?>" class="btn  col-md-12 rounded border submit2" style="background-color: #f3f2f7;">Ver detalles</a>
                        </div>
                    </div>
                <?php } ?>

            </div>

        </div>






        <!-- Comentario para cada producto  -->

        <div class="container">
            <p>&nbsp;</p>

            <h1>Añadir un comentario</h1>
            <div class="col-md-12">
                <input type="hidden" class="idf form-control" value="<?php echo $id ?>"><br>
                <input type="text" class="name form-control" placeholder="Nombre"><br>
                <input type="text" class="email form-control" placeholder="Email"><br>
                <textarea class="comment form-control" style="height: 150px;" placeholder="Introduce el comentario"></textarea>
                <p>&nbsp;</p>
                <a href="javascript:void(0)" class="btn btn-primary submit" style="border-radius: 20px; background-color: white; color: black; width: 200px;;"> <strong> Añadir </strong></a>
                <p>&nbsp;</p>
            </div>
            <div class="comment_listing"></div>
            <div class="clearfix"></div>
        </div>




        <script>
            var ratedIndex = -1,
                uID = 0;
            $(document).ready(function() {
                resetStarColors();

                if (localStorage.getItem('ratedIndex') != null) {
                    setStars(parseInt(localStorage.getItem('ratedIndex')));
                    uID = localStorage.getItem('uID');
                }

                $('.fa-star').on('click', function() {
                    ratedIndex = parseInt($(this).data('index'));
                    localStorage.setItem('ratedIndex', ratedIndex);
                    saveToTheDB();
                });

                $('.fa-star').mouseover(function() {
                    resetStarColors();
                    var currentIndex = parseInt($(this).data('index'));
                    setStars(currentIndex);
                });

                $('.fa-star').mouseleave(function() {
                    resetStarColors();

                    if (ratedIndex != -1)
                        setStars(ratedIndex);
                });
            });

            function saveToTheDB() {
                var id = $('.id').val();
                $.ajax({
                    url: "descripcionProducto.php",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                        save: 1,
                        uID: uID,
                        ratedIndex: ratedIndex
                    },
                    success: function(r) {
                        uID = r.id;
                        localStorage.setItem('uID', uID);
                    }
                });
            }

            function setStars(max) {
                for (var i = 0; i <= max; i++)
                    $('.fa-star:eq(' + i + ')').css('color', 'green');
            }

            function resetStarColors() {
                $('.fa-star').css('color', 'white');
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>

<script type="text/javascript">
    // Funciones para el comentario
    function listComments() {
        var name = $('.name').val();
        var email = $('.email').val();
        var comment = $('.comment').val();
        var id = $('.idf').val();
        $.ajax({
            url: '../back/comentProducto.php',
            data: 'name=' + name + '&email=' + email + '&comment=' + comment + '&id=' + id,
            type: 'post',
            success: function(res) {
                $('.comment_listing').html(res);
            }
        })
    }
    $(function() {


        listComments();
        setInterval(function() {
            listComments();
        }, 10000);
        $('.submit').click(function() {
            var name = $('.name').val();
            var email = $('.email').val();
            var comment = $('.comment').val();
            var id = $('.idf').val();

            $.ajax({
                url: '../back/guardarComentario.php',
                data: 'name=' + name + '&email=' + email + '&comment=' + comment + '&id=' + id,
                type: 'post',
                success: function() {
                    alert("Gracias por comentar");
                    listComments();
                }
            })

        })

    })
</script>