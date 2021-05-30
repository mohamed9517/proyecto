</html>
<?php require_once '../back/adminComentarioBack.php' ?>
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
            <h1>Administracion de comentarios</h1>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

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
                $resultado = allComentario($conexion);

                ?>
                <form action="../back/adminComentarioBack.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <table class="table table-striped table-dark" >
                        <thead>
                            <tr>
                                <th>Nombre usuario</th>
                                <th>Email</th>
                                <th>Comentario</th>
                                <th>Fecha comentario</th>
                                <th>Estado</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><input type="text" name="nombre" value="<?php echo $nombre ?>"></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <select name="estado" id="estado">
                                        <option name="estado">visible </option>
                                        <option name="estado">invisible</option>


                                    </select>
                                </th>


                                <?php if ($editar == true) {

                                ?>
                                    <th><button type="submit" name="editar" class="btn btn-info mt-3">Editar</button></th>

                                <?php } ?>


                            </tr>

                        </tbody>
                        <?php
                        while ($row = $resultado->fetch_assoc()) {
                        ?>
                            <tbody>
                                <tr>
                                    <th><?php echo $row['nombre']; ?></th>
                                    <th><?php echo $row['email']; ?> </th>
                                    <th><?php echo $row['comentario']; ?></th>
                                    <th><?php echo $row['fecha_comentario']; ?></th>
                                    <th>
                                        <?php echo $row['estado'] ?>
                                    <th>

                                        <a href="adminComentarios.php?edit=<?php echo $row['id_comentarios'] ?>" class="btn btn-info">Editar</a>
                                        <a href="../back/adminComentarioBack.php?elimi=<?php echo $row['id_comentarios'] ?>" class="btn btn-danger" onclick="return confirmDelet()">Eliminar</a>
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