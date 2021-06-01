<?php
include_once('../bd/DAOUsuario.php');
include_once('../bd/conexion.php');
include_once('../bd/DAOCategoria.php');
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link rel="icon" type="image/png" href="../img/funkopng.png" />


</head>


<body style="background-color: #f3f2f7;">
  <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: black;" style="width: 90%;">
    <div class="container-fluid">
      <a class="navbar-brand text-light mr-2 " href="#"><img src="../img/LogoF16.png" alt="logo ArtFunko" style="height: 40px; width: 60px;"> </a>
      <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-white"></span>
      </button>
      <div class="collapse navbar-collapse col-lg-7" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item dropdown mr-2">
            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <strong>PRODUCTOS</strong>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li>
                <a class="dropdown-item" href="allProductos.php"> All </a>
              </li>
              <?php
              $resultado = allCategorias($conexion);
              while ($row = mysqli_fetch_array($resultado)) {
              ?>
                <li>
                  <a class="dropdown-item" href="filtroCategoria.php?id=<?php echo $row['id_categoria'] ?>"> <?php echo $row['nombre_cat']; ?> </a>

                </li>
              <?php } ?>
            </ul>
          </li>
          <li class="nav-item dropdown mr-2 ">
            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <strong> DESTACADOS</strong>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="nuevos.php">Ultimos añadidos</a></li>
              <li><a class="dropdown-item" href="enStock.php">En stock</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse col-lg-3" id="navbarScroll" style="width: 100%;">
    
        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin' ) { ?>

          <div class="collapse navbar-collapse col-lg-7" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item dropdown mr-2 ">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <strong> ADMINISTRACION</strong>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                  <li><a class="dropdown-item" href="adminProducto.php">Productos</a></li>
                  <li><a class="dropdown-item" href="adminCategoria.php">Categorias</a></li>
                  <li><a class="dropdown-item" href="adminUsuario.php">Usuarios</a></li>
                  <li><a class="dropdown-item" href="adminPedidos.php">Pedidos</a></li>
                  <li><a class="dropdown-item" href="adminCesta.php">Cesta</a></li>
                  <li><a class="dropdown-item" href="adminComentarios.php">Comentarios</a></li>
                  <li><a class="dropdown-item" href="AdminVotos.php">Votos</a></li>
                </ul>
              </li>
            </ul>
          </div>
        <?php } else { ?>
          <form class="d-flex mr-2">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" style="border-radius: 20px; width: 200px;">
          </form>
        <?php } ?>













        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <?php if (isset($_SESSION['id_usuario'])) {
          ?>
            <li class="nav-item mr-2 ">
              <a class="nav-link active text-light" aria-current="page" href="myCuenta.php"><img src="../img/funkopng.png" alt="" style="width: 30px;"></a>
            </li>

          <?php } else { ?>
            <li class="nav-item mr-2">
              <a class="nav-link active text-light" aria-current="page" href="login.php"><img src="../img/login001.png" alt="" style="width: 25px;"></a>
            </li>
          <?php } ?>



          <li class="nav-item">
            <a class="nav-link text-light" href="cesta.php"> <img src="../img/cesta1.png" alt="" style="width: 25px;"> </a>
          </li>
          <li class="nav-item mr-2">
            <span style="color: white;"><?php
                                        if (isset($_SESSION['cesta'])) {
                                          echo count($_SESSION['cesta']);
                                        } else {
                                        }

                                        ?></span>
          </li>

          <li class="nav-item mr-3">
            <a class="nav-link text-light" href="#"><img src="../img/iconoIdioma2.png" alt="" style="width: 25px;"> </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-2">
    <div class="row">


      <nav aria-label="breadcrumb ">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a style="text-decoration: none; color: black; " href="../index.php">Home</a></li>
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
            <strong>
              <h2 class="text-black"> <strong>Perfil</strong> </h2>
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
            <p>*************</p>
            <div class="row mb-1" style="display: flex; justify-content: center;">
              <a href="editarPassword.php" class="btn" style="background-color: #f3f2f7; border-radius: 20px; font-size: 20px;"> <strong>Editar</strong> </a>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>