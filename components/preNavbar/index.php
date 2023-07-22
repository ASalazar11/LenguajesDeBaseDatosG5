<link rel="stylesheet" type="text/css" href="components/navbar/navbar.css">
<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<header class="section-header">

    <nav class="navbar navbar-dark navbar-expand p-0" style="background-color: #4361D1;">
        <div class="container-fluid">
            <ul class="navbar-nav d-none d-md-flex mr-auto">
                <li class="nav-item"><a class="nav-link" href="index.php" data-abc="true">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php" data-abc="true">Iniciar sesion</a></li>
                <li class="nav-item"><a class="nav-link" href="contactenos2.php" data-abc="true">Contactenos</a></li>
            </ul>
            <ul class="navbar-nav d-flex align-items-center">
                <li class="nav-item">
                    <div class="d-flex flex-row">
                        <img src="assets/logo.png" class="rounded-circle" width="30">
                    </div>
                </li>
                <li class="nav-item">


                    <?php
                    //sigue con la conexion o la crea si no hay
                    require_once 'models/user.model.php';
                    $user = new User(0, "Invitado");


                    echo  "<a title='Iniciar sesion...' class='nav-link' href='login.php' role='button'>
                    <span>{$user->username}</span>
                    </a>";

                    ?>
                </li>

            </ul> <!-- list-inline //  -->
        </div> <!-- navbar-collapse .// -->
        <!-- container //  -->
    </nav> <!-- header-top-light.// -->

    <section class="header-main border-bottom" style="background-color: rgb(250, 250, 250);">
        <div class="container-fluid">
            <div class="row p-2 pt-3 pb-3 d-flex align-items-center">
                <div class="col-auto">
                    <div class="card" style="background-color: black;max-height: 70px;
                    ">
                        <div class="card-body" style="background-color: black;max-height: 40px;
                    ">

                            <div class="d-flex align-items-center mb-3 pb-1" style="max-height: 10px;">
                                <img src="assets/logo-icon-white.png" alt="logo" style="width: 2em; height: 2em;" />
                                <span class="h2 mb-0" style="color:white">SHOP</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="d-flex form-inputs">
                        <input class="form-control" type="text" placeholder="Busca cualquier producto...">
                        <i class="bx bx-search"></i>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="d-flex d-none d-md-flex flex-row align-items-center">
                        <span class="shop-bag"><i class='bx bxs-shopping-bag'></i></span>
                        <div class="d-flex flex-column ms-2">
                            <span class="qty">Carrito vacio</span>
                            <span class="price fw-bold">CRC 0.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</header>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>