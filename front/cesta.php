<?php
session_start();
include '../bd/conexion.php';
if (isset($_SESSION['cesta'])) {

    if (isset($_GET['id'])) {
        $arr = $_SESSION['cesta'];
        $encontro = false;
        $numero = 0;
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i]['Id'] == $_GET['id']) {
                $encontro = true;
                $numero = $i;
            }
        }

        if ($encontro == true) {
            $arr[$numero]['Cantidad'] = $arr[$numero]['Cantidad'] + 1;
            $_SESSION['cesta'] = $arr;
        } else {
            // No hay registro
            $nombre = "";
            $precio = "";
            $imagen = "";
            $res = $conexion->query('select * from producto where id_producto=' . $_GET['id']);
            $fila = mysqli_fetch_row($res);
            $nombre = $fila[2];
            $precio = $fila[4];
            $imagen = $fila[5];
            $arrN = array(
                'Id' => $_GET['id'],
                'Nombre' => $nombre,
                'Precio' => $precio,
                'Imagen' => $imagen,
                'Cantidad' => 1
            );
            array_push($arr, $arrN);
            $_SESSION['cesta'] = $arr;
        }
    }
} else {
    if (isset($_GET['id'])) {
        $nombre = "";
        $precio = "";
        $imagen = "";
        $res = $conexion->query('select * from producto where id_producto=' . $_GET['id']);
        $fila = mysqli_fetch_row($res);
        $nombre = $fila[2];
        $precio = $fila[4];
        $imagen = $fila[5];
        $arr[] = array(
            'Id' => $_GET['id'],
            'Nombre' => $nombre,
            'Precio' => $precio,
            'Imagen' => $imagen,
            'Cantidad' => 1
        );
        $_SESSION['cesta'] = $arr;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">


            <table class="table">
                <thead>
                    <tr style="background-color: #f3f2f7;">
                        <th scope="col">Imagen</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Total</th>
                        <th scope="col">Eliminar</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    if (isset($_SESSION['cesta'])) {
                        $cestaArr = $_SESSION['cesta'];
                        for ($i = 0; $i < count($cestaArr); $i++) {
                            $total = $total + ((int)$cestaArr[$i]['Precio'] * (int)$cestaArr[$i]['Cantidad']);
                    ?>
                            <tr>
                                <th><img style="width: 100px;" src="../img/imgProductos/<?php echo $cestaArr[$i]['Imagen']; ?>" alt="ccc"></th>
                                <td><?php echo $cestaArr[$i]['Nombre']; ?></td>
                                <td><?php echo $cestaArr[$i]['Precio']; ?> $ </td>
                                <td><input type="text" class="textCantidad" data-precio="<?php echo $cestaArr[$i]['Precio']; ?>" data-id="<?php echo $cestaArr[$i]['Id']; ?>" value="<?php echo $cestaArr[$i]['Cantidad']; ?>">


                                </td>
                                <td class="cant<?php echo $cestaArr[$i]['Id']; ?>"> <?php echo $cestaArr[$i]['Cantidad'] * (int)$cestaArr[$i]['Precio'];   ?>$ </td>
                                <td>  <a href="" style="width: 40px;" class="btn btn-danger btn-sm btnEliminar" data-id="<?php echo $cestaArr[$i]['Id']; ?>">X</a></td>
                            </tr>

                    <?php }
                    } ?>


                </tbody>
                <tbody>
                    <th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <strong>Total:</strong>  <?php echo $total ?> $</td>
                    <td> </td>
                    </th>

                </tbody>

            </table>
           
            <div class="container">
                <div class="row">
                
                    <div class="col-md-12">
                    <hr>
                        <a href="pedido.php" style="background-color: #f3f2f7; border: solid black 1px; float: right;" class="btn"  >Continuar con el pedido</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $(".btnEliminar").click(function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                var boton = $(this);
                $.ajax({
                    method: 'POST',
                    url: '../back/eliminarProductoCesta.php',
                    data: {
                        id: id

                    }
                }).done(function(respuesta) {
                    boton.parent('td').parent('tr').remove();

                });
            });




            $(".textCantidad").keyup(function() {
                var cantidad = $(this).val();
                var precio = $(this).data('precio');
                var id = $(this).data('id');
                var mult = parseFloat(cantidad) * parseFloat(precio);
                $(".cant" + id).text(mult);
                $.ajax({
                    method: 'POST',
                    url: '../back/actualizarProductoCesta.php',
                    data: {
                        id: id,
                        cantidad: cantidad

                    }
                }).done(function(respuesta) {


                });

            });
        });
    </script>

</body>

</html>