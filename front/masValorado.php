<?php
require_once('../bd/conexion.php');
require_once('../bd/DAOProducto.php');


?>

<!DOCTYPE html>
<html>

<head>
    <title>Filtrar Producto</title>
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="container mt-2">
        <div class="row">


            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style="text-decoration: none; color: black; " href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">En stock</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-fluid mt-1 mb-1">
        <div class="row">
            <div>
                <h2 class="mt-1"> <strong> En stock</strong></h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12" style="background-color: #f3f2f7;">

                <div>
                    <div class="row">

                        <?php
                        $resultado =  allProductosEnStock($conexion);
                        while ($fila = mysqli_fetch_array($resultado)) {

                        ?>

                            <div class="card col-md-3 col-sm-6 col-xm-6 mt-2 mr-0.3" style="width: 18rem;">
                                <img class="card-img-top" src="../img/imgProductos/<?php echo $fila['imagen1_producto']; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <input type="hidden" class="id" value="<?php echo $fila['id_producto'] ?>">
                                    <h5 class="card-title"><?php echo $fila['nombre_producto'] ?></h5>
                                    <p class="card-text">$<?php echo $fila['precio_producto'] ?></p>
                                    <a href="../front/descripcionProducto.php?id=<?php echo $fila['id_producto'] ?>" class="btn  col-md-12 rounded border submit2" style="background-color: #f3f2f7;">Ver detalles</a>
                                </div>
                            </div>
                        <?php } ?>

                    </div>



                </div>
            </div>
        </div>


    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>