<?php
include_once('../bd/DAOUsuario.php');
include_once('../bd/conexion.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/indexcss.css">
</head>

<body style="background-color: #f3f2f7;">

    <?php
    include_once 'header.php'
    ?>
    <?php
    // Consulta al usuario seleccionando segun el id de la session, en caso de no exite 
    $id = $_GET['edit'];
    $resultado = MostrarU($conexion, $id);

    ?>

    <?php
    while ($row = $resultado->fetch_assoc()) {
    ?>
        <div class="container mt-5 ">
            <div class="row">
                <h2>Editar perfil</h2>
            </div>
        </div>
        <div class="container shadow" style="background-color: white;">
            <div class="row">

                <div class="col-4 col-sm-4 ">
                    <form method="POST" action="../back/modificarDatosClienteBack.php">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <strong><label>Usuario</label></strong>
                            <input type="text" name="usua" class="form-control" placeholder="<?php echo $row['usuario'] ?>">
                        </div>
                        <div class="form-group">
                            <strong><label>Nombre</label></strong>
                            <input type="text" class="form-control" name="nombre" placeholder="<?php echo $row['nombre'] ?>" value="<?php echo $row['nombre'] ?>">
                        </div>
                        <div class="form-group">
                            <strong><label>Primer apellido</label></strong>
                            <input type="text" class="form-control" name="apellido1" placeholder="<?php echo $row['apellido1'] ?>" value="<?php echo $row['apellido1'] ?>">
                        </div>
                        <div class="form-group">
                            <strong><label>Segundo apellido</label></strong>
                            <input type="text" class="form-control" name="apellido2" placeholder="<?php echo $row['apellido2'] ?>" value="<?php echo $row['apellido2'] ?>">
                        </div>
                        <div class="form-group">
                            <strong><label>Email</label></strong>
                            <input type="text" class="form-control" name="email" placeholder="<?php echo $row['email'] ?>" value="<?php echo $row['email'] ?>">
                        </div>
                        <div class="text-center">
                            <button name="editar" type="submit" class="btn btn-primary mb-1">Guardar cambios</button>
                        </div>

                    </form>
                </div>
                <div class="col-8 col-sm-8 text-center">
                    <img src="../img/funko.png" alt="" style="height: 500px;">
                </div>

            </div>
        </div>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>