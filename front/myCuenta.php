<?php
include_once('../bd/DAOUsuario.php');
include_once('../bd/conexion.php');
session_start();
if (!isset($_SESSION['id_usuario'])) {
  header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mi cuenta Funko</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


</head>


<body style="background-color: #f3f2f7;">

  <?php
  include_once 'header.php'
  ?>
  <div class="container mt-2">
    <div class="row">


      <nav aria-label="breadcrumb ">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a style="text-decoration: none; color: black; " href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Mi cuenta</li>
        </ol>
      </nav>
    </div>
  </div>

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

        <h1 class="mt-2 col-12" style="font-size: 50px;;"><strong> MI CUENTA </strong></h1>
        <div class="col-12 card shadow">
          <div class="card-header">
          <?php if (isset($_SESSION['rol'])=='admin') { ?> 
            <div class="dropdown" style="float: right;">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Administracion
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="adminProducto.php">Productos</a>
                <a class="dropdown-item" href="adminCategoria.php">Categorias</a>
                <a class="dropdown-item" href="adminUsuario.php">Usuarios</a>
                <a class="dropdown-item" href="adminPedidos.php">Pedidos</a>
                <a class="dropdown-item" href="adminCesta.php">Cesta</a>
                <a class="dropdown-item" href="adminComentarios.php">Comentarios</a>
                <a class="dropdown-item" href="AdminVotos.php">Votos</a>

              </div>
            </div>
            <?php }else{
              
            } ?>





            <strong>
              <h2 class="text-black" style=""> <strong>Perfil</strong> </h2>
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
              <a href="modificarDatosCliente.php?edit=<?php echo $row['id_usuario'] ?>" class="btn" style="background-color: #f3f2f7; border-radius: 20px; font-size: 20px;"> <strong>Editar</strong> </a>
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
              <a href="modificarDatosCliente.php?edit=<?php echo $row['id_usuario'] ?>" class="btn" style="background-color: #f3f2f7; border-radius: 20px; font-size: 20px;"> <strong>Editar</strong> </a>
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
              <h3 class="text-black">Direccion de Pedidos</h3>
            </strong>
          </div>
          <div class="card-body">
            <p><?php echo $row['password'] ?></p>
            <div class="row mb-1" style="display: flex; justify-content: center;">
              <a href="modificarDatosCliente.php?edit=<?php echo $row['id_usuario'] ?>" class="btn" style="background-color: #f3f2f7; border-radius: 20px; font-size: 20px;"> <strong>Editar</strong> </a>
            </div>
          </div>
        </div>

      </div>

    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 mt-5 mb-5" style="display: flex; justify-content: center;">
          <a href="../back/desloguear.php" style="background-color: #f3f2f7; border-radius: 20px; font-size: 20px;" class="btn"> <strong> Salir </strong></a>
        </div>
      </div>

    </div>

  <?php } ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>