<?php
session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/indexcss.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="../img/funkopng.png" />
    <title>Recuperar contraseña</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
                <div class="row">
                    <div class="col-lg-6 col-md-8 mx-auto">


                        <div class="card rounded shadow shadow-sm">
                            <div class="card-header justify-content-center">
                                <h3 class="mb-0 text-center">Modificar contraseña</h3>
                            </div>
                            <div class="card-body">
                                <form action="../back/EditarContrasenaBack.php" method="POST">
                                    <div class="form-group">
                                        <label for="uname1">Usuario</label>
                                        <input type="text" class="form-control" name="usuario" placeholder="" id="usuario">

                                    </div>
                                    <div class="form-group">
                                        <label for="uname1"> Nueva contraseña</label>
                                        <input type="text" class="form-control" name="pass1" placeholder="" id="passwordN">

                                    </div>
                                    <div class="form-group">
                                        <label> repite la contraseña </label>
                                        <input type="text" class="form-control" name="pass2" placeholder="" id="passwordC">

                                    </div>
                                    <div class="bg-danger text-white mb-3" style="display: flex; justify-content: center;"><?php
                                                                            if (isset($_SESSION['error'])) {
                                                                                echo $_SESSION['error'];
                                                                                unset($_SESSION['error']);
                                                                            }

                                                                            ?></div>
                                    <button type="submit" class="btn btn-info btn-lg btn-responsive ">Modificar</button>
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