<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/b57da3fc72.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>


    <div class="container mt-2 mb-2" id="contenido" style="width: 700px;">
        <div class="card-header" style="display: flex; justify-content: center; color: black;">
            <h2 class="text-dark">Registrar</h2>
        </div>
        <div class="card-body card rounded shadow shadow-sm">
            <div>
                <form method="POST" action="../back/insertarUsuario.php">

                    <div class="form-group ">
                        <label>Nombre</label>
                        <div></div>
                        <input type="text" class="form-control" name="nombre" placeholder="" id="nombre">
                        <span id="errorNombre"> <i class="fas fa-times" style="color: red;"></i>El nombre esta mal escrito</span>
                        <i id="corectNombre" style="color: green;" class="fas fa-check-circle"></i>
                    </div>

                    <div class="form-group">
                        <label>Primer apellido</label>
                        <input type="text" class="form-control" name="apellido1" placeholder="" id="apellido1">
                        <span id="errorApellido1"> <i class="fas fa-times" style="color: red;"></i>El primero apellido esta mal escrito</span>
                        <i id="corectApellido1" class="fas fa-check-circle"></i>
                    </div>


                    <div class="form-group">
                        <label>Segundo apellido</label>
                        <input type="text" class="form-control" name="apellido2" placeholder="" id="apellido2">
                        <span id="errorApellido2"> <i class="fas fa-times" style="color: red;"></i>El primero apellido esta mal escrito</span>
                        <i id="corectApellido2" class="fas fa-check-circle"></i>
                    </div>


                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" class="form-control" name="usuario" placeholder="" id="usuario">
                        <span id="errorUsuario"> <i class="fas fa-times" style="color: red;"></i> El usuario esta mal escrito</span>
                        <i id="corectUsuario" class="fas fa-check-circle"></i>

                    </div>


                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="" id="password">
                        <span id="errorPassword"> <i class="fas fa-times" style="color: red;"></i> El password esta mal escritos</pan>
                            <i id="corectPassword" class="fas fa-check-circle"></i>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="" id="email">
                        <span id="errorEmail"> <i class="fas fa-times" style="color: red;"></i> El email esta mal escrito</span>
                        <i id="corectEmail" class="fas fa-check-circle"></i>
                    </div>

                    <div style="display: flex; justify-content: center;">
                        <button type="submit" class="btn btn-info btn" id="registrar">Registrar</button>
                        <a class="btn " href="login.php">¿Ya tengo cuenta?</a>
                    </div>


                </form>
            </div>
        </div>
    </div>

    <script src="../js/validarRegistro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>