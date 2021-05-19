<?php require_once '../back/adminCategoriaBack.php' ?>
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

function confirmDelet(){

    var respuest= confirm("Estas seguro que quieres eliminar la categoria");
    if(respuest == true){
        return true;

    }else{
        return false;
    }

}

</script>

<body>
    <?php include_once('header.php'); ?>

    <div class="container mt-4">
        <div class="row">

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
            $resultado = allCategorias($conexion);

            ?>
            <form action="../back/adminCategoriaBack.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <table class="table table-dark" style="font-size: 11px">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Imagen</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><input type="text" name="nombre" placeholder="Introduce el nombre de la categoria" value="<?php echo $nombre ?>"> </th>
                            <th><input type="text" name="descripcion" id="" placeholder="Introduce el nombre de la Imagen" value="<?php echo $descripcion ?>"></th>
                            <th><input type="text" name="imagen" placeholder="Introduce el descripcion" value="<?php echo $imagen ?>"> </th>
                            

                            <?php if ($editar == true) {

                            ?>
                                <th><button type="submit" name="editar" class="btn btn-info mt-3">Editar</button></th>

                            <?php } else { ?>

                                <th><button type="submit" name="save" class="btn btn-primary">Añadir</button></th>
                            <?php } ?>
                        </tr>

                    </tbody>
                    <?php
                    while ($row = $resultado->fetch_assoc()) {
                    ?>
                        <tbody>
                            <tr>
                                <th><?php echo $row['nombre_cat']; ?></th>
                                <th> <textarea cols="30" rows="1"> <?php echo $row['descripcion_cat']; ?> </textarea> </th>
                                <th><?php echo $row['imgane_cat']; ?></th>
                                <th>
                                    <a href="adminCategoria.php?edit=<?php echo $row['id_categoria'] ?>" class="btn btn-info">Editar</a>
                                    <a href="../back/adminCategoriaBack.php?elimi=<?php echo $row['id_categoria'] ?>" class="btn btn-danger" onclick="return confirmDelet()">Eliminar</a>
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