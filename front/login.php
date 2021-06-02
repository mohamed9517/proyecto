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
    <link rel="icon" type="image/png" href="../img/funkopng.png" />

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
                <div class="row">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <div class="card rounded shadow shadow-sm">
                            <div class="card-header">
                                <h3 class="mb-0">Login</h3>
                            </div>
                            <div class="card-body">
                                <form action="../back/comprobarUsuario.php" method="POST">
                                    <div class="form-group">
                                        <label for="uname1">Username</label>
                                        <input type="text" class="form-control form-control-lg rounded-0" name="usuario" id="uname1">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control form-control-lg rounded-0" name="password" id="pwd1" required="" autocomplete="new-password">
                                        <div class="invalid-feedback">Enter your password too!</div>
                                    </div>
                                    <div class="bg-danger text-white "><?php
                                                                        if (isset($_SESSION['error'])) {
                                                                            echo $_SESSION['error'];
                                                                            unset($_SESSION['error']);
                                                                        }
                                                                        ?></div>

                                    <div class="bg-primary text-white "><?php
                                                                        if (isset($_SESSION['cont'])) {
                                                                            echo $_SESSION['cont'];
                                                                            unset($_SESSION['cont']);
                                                                        }
                                                                        ?></div>

                                    <a href="registrar.php">Registrar</a><br>
                                    <a href="recuperarContrasena.php">Recuperar contraseña</a><br>
                                    <button type="submit" class="btn btn-info btn-lg btn-responsive ">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>