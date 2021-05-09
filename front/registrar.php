<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>
    <div class="container mt-2 mb-2" id="contenido" style="width: 500px;">
        <div class="card-header" style="background: #dcdcdc;">
            <h2 class="text-dark">Registrar</h2>
        </div>
        <div class="card-body card rounded shadow shadow-sm">
            <div>
                <form method="POST" action="../back/insertarUsuario.php">

                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="" id="nombre">
                        <!-- <span id="errorNombre">El nombre esta mal escrito</span><br> -->
                    </div>
                    <div class="form-group">
                        <label>Primer apellido</label>
                        <input type="text" class="form-control" name="apellido1" placeholder="" id="apellido1">
                        <!-- <span id="errorApellido1">El primero apellido esta mal escrito</span><br> -->
                    </div>
                    <div class="form-group">
                        <label>Segundo apellido</label>
                        <input type="text" class="form-control" name="apellido2" placeholder="" id="apellido2">
                        <!-- <span id="errorApellido2">El segundo apellido esta mal escrito</span><br> -->
                    </div>
                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" class="form-control" name="usuario" placeholder="" id="usuario">
                        <!-- <span id="errorUsuario">El usuario esta mal escrito</span><br> -->
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="" id="password">
                        <!-- <span id="errorPassword">El password esta mal escrito</span><br> -->
                    </div>
                   
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="" id="email">
                        <!-- <span id="errorEmail">El email esta mal escrito</span><br> -->
                    </div>
            </div>
            <a class="btn btn-responsive" href="login.php">¿Ya tengo cuenta?</a>
            <button type="submit" class="btn btn-info btn-lg btn-responsive" id="registrar">Registrar</button>
        </div>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>