<?php
session_start();
$nombre = "";
$apellido1 = "";
$apellido2 = "";
$email = "";
if (isset($_SESSION['usuario'])) {

    $nombre = $_SESSION['nombre'];
    $apellido1 = $_SESSION['apellido1'];
    $apellido2 = $_SESSION['apellido2'];
    $email = $_SESSION['email'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/indexcss.css"> -->
    <script src="https://kit.fontawesome.com/b57da3fc72.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-6">
                <div class="container " id="contenido" style="background: none;">
                    <div class="card-header" style="background-color: #f3f2f7; display: flex; justify-content: center;">
                        <h2 class="text-dark"> DATOS DEL PEDIDO</h2>
                    </div>
                    <div class="card-body card rounded shadow shadow-sm">
                        <div>
                            <form  action="../back/guardarPedido.php" method="POST" style="font-size: 12px;">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Nombre</label>
                                        <div></div>
                                        <input type="text" class="form-control" name="nombre" placeholder="<?php echo $nombre; ?>" id="nombre">
                                        <span id="errorNombre"> <i class="fas fa-times" style="color: red;"></i>El nombre esta mal escrito</span>
                                        <i id="corectNombre" style="color: green;" class="fas fa-check-circle"></i>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Primer apellido</label>
                                        <input type="text" class="form-control" name="apellido1" placeholder="<?php echo $apellido1; ?>" id="apellido1">
                                        <span id="errorApellido1"> <i class="fas fa-times" style="color: red;"></i>El primero apellido esta mal escrito</span>
                                        <i id="corectApellido1" style="color: green;" class="fas fa-check-circle"></i>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Segundo apellido</label>
                                    <input type="text" class="form-control" name="apellido2" placeholder="<?php echo $apellido2; ?>" id="apellido2">
                                    <span id="errorApellido2"> <i class="fas fa-times" style="color: red;"></i>El primero apellido esta mal escrito</span>
                                    <i id="corectApellido2" style="color: green;" class="fas fa-check-circle"></i>
                                </div>


                                <div class="form-group">
                                    <label>Dni</label>
                                    <input type="text" class="form-control" name="dni" placeholder="" id="dni">
                                    <span id="errorDni"> <i class="fas fa-times" style="color: red;"></i> El dni esta mal escrito</span>
                                    <i id="corectDni" style="color: green;" class="fas fa-check-circle"></i>

                                </div>

                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input type="text" class="form-control" name="telefono" placeholder="" id="telefono">
                                    <span id="errorTelefono"> <i class="fas fa-times" style="color: red;"></i> El telefono esta mal escrito</span>
                                    <i id="corectTelefono" style="color: green;" class="fas fa-check-circle"></i>

                                </div>
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input type="text" class="form-control" name="direccion" placeholder="" id="telefono">
                                    <!-- <span id="errorTelefono"> <i class="fas fa-times" style="color: red;"></i> El telefono esta mal escrito</span>
                                    <i id="corectTelefono" style="color: green;" class="fas fa-check-circle"></i> -->

                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="<?php echo $email; ?>" id="email">
                                    <span id="errorEmail"> <i class="fas fa-times" style="color: red;"></i> El email esta mal escrito</span>
                                    <i id="corectEmail" style="color: green;" class="fas fa-check-circle"></i>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label>CP</label>
                                        <input type="text" class="form-control" name="cp" placeholder="" id="cp">
                                        <span id="errorCp"> <i class="fas fa-times" style="color: red;"></i> El cp esta mal escrito</span>
                                        <i id="corectCp" style="color: green;" class="fas fa-check-circle"></i>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Provincia</label>
                                        <input type="text" class="form-control" name="provincia" placeholder="" id="provincia">

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Comunidad autonoma</label>
                                        <input type="text" class="form-control" name="comunidadAutonoma" placeholder="" id="comunidadAutonoma">
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: center;">
                                    <button type="submit" class="btn btn-info btn" id="registrar">Finalizar proceso</button>
                                </div>

                            </form>
                        </div>

                        <div class="row" style="display: flex; justify-content: right;">


                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12" style="background-color: #f3f2f7;">
                    <h4 class="">Introduce el cupon para el descuento</h4>
                    <input style="background-color: white; border: black solid 1px;;" class="mt-3 mb-3" type="text" placeholder="Codigo:123456">
                </div>
                <div class="mt-5">
                    <h4>Lista de productos</h4>
                    <table class="table mt-2" >
                        <thead style="background-color: #f3f2f7;">
                            <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Precio a la unidad</th>

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

                                        <td>FIGURA <?php echo $cestaArr[$i]['Nombre']; ?> ( <strong><?php echo $cestaArr[$i]['Cantidad']; ?> Unidades </strong> ) </td>
                                        <td> <?php echo $cestaArr[$i]['Precio']; ?> $ </td>

                                    </tr>

                            <?php }
                            } ?>


                        </tbody>
                        <tbody>
                            <th>
                            <td></td>
                            <td> <strong>Total:</strong> <?php echo $total ?></td>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
    <script src="../js/validarPedido.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>