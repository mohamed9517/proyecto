<?php require_once '../back/adminVotoBack.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion Votos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<script type="text/javascript">
</script>

<body style="background-color: #f3f2f7;">

    <?php include_once('header.php'); ?>

    <div class="container mt-4">
        <div class="row">
            <h1>Administracion de votos</h1>
        </div>
    </div>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-8">
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
                $resultado = allVotos($conexion);

                ?>
                <form action="../back/adminVotoBack.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <table class="table table-dark" >
                        <thead>
                            <tr>
                                <th>id del voto</th>
                                <th>El ratio (1-5)</th>
                                <th>Nombre Producto</th>


                            </tr>
                        </thead>

                        <?php
                        while ($row = $resultado->fetch_assoc()) {
                        ?>
                            <tbody>
                                <tr>
                                    <th><?php echo $row['id']; ?></th>
                                    <th><?php echo $row['rateIndex']; ?></th>

                                    <th><?php echo $row['nombre_producto']; ?> </th>
                                    <th>
                                        <a href="../back/adminVotoBack.php?elimi=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a>
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