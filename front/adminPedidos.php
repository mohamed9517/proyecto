<?php require_once '../back/adminPedidoBack.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion pedidos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<script type="text/javascript">
    function confirmDelet() {

        var respuest = confirm("Estas seguro que quieres eliminar la categoria");
        if (respuest == true) {
            return true;

        } else {
            return false;
        }

    }
</script>

<body style="background-color: #f3f2f7;">
    <?php include_once('header.php'); ?>
    <div class="container mt-4">
        <div class="row">
            <h1>Administracion de pedidos</h1>

        </div>
    </div>
    <div class="container ">
        <div class="row">
            <div class="com-md-12">
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
                $resultado = allPedidos($conexion);

                ?>
                <form action="../back/adminPedidoBack.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Direccion</th>
                                <th>Codigo postal</th>
                                <th>Telefono</th>
                                <th>Provincia</th>
                                <th>Comunidad Autonoma</th>
                                <th>id pedido</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><input type="text" name="direccion" placeholder="" value="<?php echo $direccion ?>"> </th>
                                <th><input type="text" name="cp" id="" placeholder="" value="<?php echo $cp ?>"></th>
                                <th><input type="text" name="telefono" placeholder="" value="<?php echo $telefono ?>"> </th>
                                <th><input type="text" name="provincia" placeholder="" value="<?php echo $provincia ?>"> </th>
                                <th><input type="text" name="comunidadA" placeholder="" value="<?php echo $comunidadA ?>"> </th>
                                <?php if ($editar == true) {
                                ?>
                                    <th><button type="submit" name="editar" class="btn btn-info mt-3">Editar</button></th>
                                <?php }  ?>
                            </tr>

                        </tbody>
                        <?php
                        while ($row = $resultado->fetch_assoc()) {
                        ?>
                            <tbody>
                                <tr>
                                    <th><?php echo $row['direccion']; ?></th>
                                    <th><?php echo $row['cp']; ?> </th>
                                    <th><?php echo $row['telefono']; ?></th>
                                    <th><?php echo $row['provincia']; ?></th>
                                    <th><?php echo $row['comunidadA']; ?></th>
                                    <th><?php echo $row['comunidadA']; ?></th>
                                    <th><?php echo $row['id_pedido']; ?></th>

                                    <th>
                                        <a href="adminPedidos.php?edit=<?php echo $row['id_pedido'] ?>" class="btn btn-info">Editar</a>
                                        <a href="../back/adminPedidoBack.php?elimi=<?php echo $row['id_pedido'] ?>" class="btn btn-danger" onclick="return confirmDelet()">Eliminar</a>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>