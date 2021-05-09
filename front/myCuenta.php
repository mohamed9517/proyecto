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
  $id = $_SESSION['id_usuario'];
  $resultado = MostrarU($conexion, $id);

  ?>

  <?php
  while ($row = $resultado->fetch_assoc()) {
  ?>
    <div class="container">
      <div class="row">


        <h1 class="mt-5 col-12" style="font-size: 50px;;"><strong> MI CUENTA </strong></h1>
        <div class="col-12 card shadow">
          <div class="card-header">
            <strong>
              <h2 class="text-black">Perfil</h2>
            </strong>
          </div>
          <div class="card-body">
          <h4>Nombre</h4>
          <p><?php echo $row['nombre'] ?></p>
          <h5>Primer apellido</h5>
          <p><?php echo $row['apellido1'] ?></p>
          <h5>Segundo apellido</h5>
          <p><?php echo $row['apellido2'] ?></p>
          <h5>Email</h5>
          <p><?php echo $row['email'] ?></p>
          <div class="row mb-1" style="display: flex; justify-content: center;">
            <a  href="modificarDatosCliente.php?edit=<?php echo $row['id_usuario'] ?>" class="btn btn-danger">Editar</a>
          </div>
          </div>
        </div>
      </div>

    </div>

    <div class="container">
      <div class="row">

        <div class="col-12 card shadow mt-5">
          <div class="card-header">
            <strong>
              <h3 class="text-black">Password</h3>
            </strong>
          </div>
          <div class="card-body">
          <p><?php echo $row['password'] ?></p>
          <div class="row mb-1" style="display: flex; justify-content: center;">
            <a href="#" class="btn btn-danger">Editar</a>
          </div>
          </div>
        </div>

      </div>

    </div>


    <div class="container">
      <div class="row">

        <div class="col-12 card shadow mt-5">
          <div class="card-header">
            <strong>
              <h3 class="text-black">Direccion</h3>
            </strong>
          </div>
          <div class="card-body">
          <p><?php echo $row['password'] ?></p>
          <div class="row mb-1" style="display: flex; justify-content: center;">
            <a href="#" class="btn btn-danger">Editar</a>
          </div>
          </div>
        </div>

      </div>

    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 mt-5 mb-5" style="display: flex; justify-content: center;">
        <a href="">Salir</a>
        </div>
      </div>

    </div>

  <?php } ?>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>