<?php
include('../bd/conexion.php');
if (isset($_POST["action"])) {
    $query = $conexion->query("SELECT * FROM producto");
    if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) {
        $query = $conexion->query("SELECT * FROM producto WHERE precio_producto BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "'");
    }
    $total_row = mysqli_num_rows($query);
    $output = '';
    if ($total_row > 0) {
        while ($row = $query->fetch_object()) {
            $output .= '

           
            <div class="card col-md-3 col-sm-4 col-xm-6 mt-2 m-1" style="width: 13rem;">
            <img class="card-img-top" src="../img/imgProductos/' . $row->imagen1_producto . '" alt="Card image cap" style="width: 200px;">
            <div class="card-body">
                <h5 class="card-title">' . $row->nombre_producto . '</h5>
                <p class="card-text">$' . $row->precio_producto . '</p>
                <a href="../front/descripcionProducto.php?id=' . $row->id_producto . '" class="btn  col-md-12 rounded border" style="background-color: #f3f2f7;">Ver detalles</a>
            </div>
        </div>
            ';
        }
    } else {
        $output = '<h3>No Data Found</h3>';
    }
    echo $output;
}
