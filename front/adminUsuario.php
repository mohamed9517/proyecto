<?php require_once '../back/adminUsuarioBack.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion categorias</title>
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
            <h1>Adminstracion Usuario</h1>
        </div>
    </div>
    <div class="container-fluid  m-2" style="font-size: 13.5px;">
        <div class="row">

            <?php
            if (isset($_SESSION['mensaje'])) :
            ?>
                <!-- Mostrar el mensaje segun la operacion realizada -->
                <div class="alert alert-<?= $_SESSION['tipo-mensaje'] ?> col-lg-12">
                    <?php
                    echo $_SESSION['mensaje'];
                    unset($_SESSION['mensaje']);
                    ?>
                </div>
            <?php endif ?>
            <?php
            // Consulta al usuario seleccionando todos los campos
            $resultado = consultaUsuario($conexion);

            ?>
            <form action="../back/adminUsuarioBack.php" method="POST">

                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Password</th>
                            <th>Nombre</th>
                            <th>Apellido1</th>
                            <th>Apellido2</th>
                            <th>Email</th>
                            <th>Rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><input type="text" name="usua" id="usuario" placeholder="Introduzca el usuario" value="<?php echo $usua ?>"></th>
                            <th><input type="text" name="pass" id="password" placeholder="Introduce el password" value="<?php echo $pass ?>"></th>
                            <th><input type="text" name="nombre" id="nombre" placeholder="Introduce el nombre" value="<?php echo $nombre ?>"></th>
                            <th><input type="text" name="apellido1" id="apellido1" placeholder="Introduzca el apellido" value="<?php echo $apellido1 ?>"></th>
                            <th><input type="text" name="apellido2" id="apellido2" placeholder="Introduce el segundo apellido" value="<?php echo $apellido2 ?>"></th>
                            <th><input type="text" name="email" id="email" placeholder="Introduce el email" value="<?php echo $email ?>"></th>
                            <th><input type="text" name="rol" id="rol" placeholder="Introduce el rol" value="<?php echo $rol ?>"></th>
                            <?php if ($editar == true) {
                            ?>
                                <th><button type="submit" name="editar" class="btn btn-info ">Editar</button></th>

                            <?php } else { ?>

                                <th><button type="submit" name="save" class="btn btn-primary">Añadir</button></th>
                            <?php } ?>
                        </tr>

                    </tbody>
                    <!-- Pasar el consulta a un aray asociativo -->
                    <?php
                    while ($row = $resultado->fetch_assoc()) {
                    ?>
                        <tbody>
                            <tr>
                                <th><?php echo $row['usuario']; ?></th>
                                <th><?php echo $row['password']; ?></th>
                                <th><?php echo $row['nombre']; ?></th>
                                <th><?php echo $row['apellido1']; ?></th>
                                <th><?php echo $row['apellido2']; ?></th>
                                <th><?php echo $row['email']; ?></th>
                                <th><?php echo $row['rol']; ?></th>
                                <th>
                                    <a href="adminUsuario.php?edit=<?php echo $row['id_usuario'] ?>" class="btn btn-info">Editar</a>
                                    <a href="../back/adminUsuarioBack.php?elimi=<?php echo $row['id_usuario'] ?>" class="btn btn-danger" onclick="return confirmDelet()">Eliminar</a>
                                </th>
                            </tr>

                        </tbody>

                    <?php } ?>
                </table>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>