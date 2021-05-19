<?php 

echo '   <nav class="navbar navbar-expand-lg" style="background-color: black;" style="width: 90%;">
<div class="container-fluid">
    <a class="navbar-brand text-light mr-2 " href="#">  </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse col-lg-7" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item dropdown mr-2">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <strong>PRODUCTOS</strong>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown mr-2 ">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <strong> DESTACADOS</strong>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>

        </ul>

    </div>
    <div class="collapse navbar-collapse col-lg-3" id="navbarScroll" style="width: 100%;">
        <form class="d-flex mr-3">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="border-radius: 20px; width: 190px;">

        </form>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <li class="nav-item mr-3 ">
                <a class="nav-link active text-light" aria-current="page" href="../front/myCuenta.php"><img src="../img/iconologin.png" alt="" style="width: 25px;"></a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link text-light" href=""><img src="../img/cesta1.png" alt="" style="width: 25px;"></a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link text-light" href="#"><img src="../img/iconoIdioma2.png" alt="" style="width: 25px;"></a>
            </li>
        </ul>
    </div>

</div>

</nav>';
?>
