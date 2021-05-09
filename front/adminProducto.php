<?php require_once '../back/adminProductoBack.php' ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de productos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>

<body>
    <?php
    include_once 'header.php';
    ?>
    <div class="container mt-4" style="display: flex;">
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


            ?>

            <h1 class="mb-3" style="justify-content: center;"><strong>PANEL ADMINISTRATIVO DE PRODUCTOS</strong></h1>
            <table class="table table-dark" style="font-size: 12px">
                <form action="../back/adminProductoBack.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <thead>
                        <tr>
                            <th>Categoria</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>Stock</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>
                                <select name="categoria">
                                    <?php
                                    $conect = allCategorias($conexion);
                                    while ($row = $conect->fetch_assoc()) {
                                    ?>
                                        <option name="categoria" value="<?php echo $row['id_categoria']; ?>">
                                            <?php echo $row['nombre_cat']; ?>
                                        </option>
                                    <?php } ?>

                                </select>

                            </th>

                            <th><input type="text" name="nombre" placeholder="Introduce el nombre" value="<?php echo $nombre ?>"> </th>
                            <th><input type="text" name="descripcion" id="" placeholder="Introduce la descripcion" value="<?php echo $descripcion ?>"></th>
                            <th><input type="text" name="precio" placeholder="Introduce el precio" value="<?php echo $precio ?>"></th>
                            <th><input type="text" name="imagen1" id="" placeholder="Introduce el nombre de la imagen" value="<?php echo $imagen1 ?>"></th>
                            <th><input type="text" name="stock" id="" placeholder="Introduce el Stock" value="<?php echo $stock ?>"></th>

                            <?php if ($editar == true) {

                            ?>
                                <th><button type="submit" name="editar" class="btn btn-info">Editar</button></th>

                            <?php } else { ?>

                                <th><button type="submit" name="save" class="btn btn-primary">Añadir</button></th>
                            <?php } ?>
                        </tr>

                    </tbody>
                </form>
                <?php
                $resultado = allProductos($conexion);
                while ($row = $resultado->fetch_assoc()) {
                ?>
                    <form action="../back/adminProductoBack.php" method="POST">
                        <tbody>
                            <tr>
                                <th>
                                    <select>
                                        <?php
                                        $conect = allCategorias($conexion);
                                        while ($row2 = $conect->fetch_assoc()) {
                                        ?>
                                            <?php if ($row['id_categoria'] == $row2['id_categoria']) {
                                            ?>
                                                <option value="<?php echo $row2['id_categoria']; ?>" selected>
                                                    <?= $row2['nombre_cat'] ?>
                                                </option>
                                            <?php } else { ?>
                                                <option value="<?php echo $row2['id_categoria']; ?>">
                                                    <?php echo $row['nombre_producto']; ?>
                                                </option>
                                            <?php } ?>
                                        <?php } ?>

                                    </select>
                                </th>
                                <th><?php echo $row['nombre_producto']; ?></th>
                                <th><?php echo $row['descripcion_producto']; ?></th>
                                <th><?php echo $row['precio_producto']; ?></th>
                                <th><?php echo $row['imagen1_producto']; ?></th>
                                <th><?php echo $row['stock_producto']; ?></th>
                                <th>
                                    <a href="adminProducto.php?edit=<?php echo $row['id_producto'] ?>" class="btn btn-info">Editar</a>
                                    <a href="../back/adminProductoBack.php?elimi=<?php echo $row['id_producto'] ?>" class="btn btn-danger" onclick="return confirmDelet()">Eliminar</a>
                                </th>
                            </tr>

                        </tbody>
                    </form>
                <?php } ?>

            </table>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>