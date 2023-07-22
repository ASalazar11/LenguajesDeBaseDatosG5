<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP</title>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

</head>
<?php
session_start();

if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']); // Limpiar la variable de sesión para futuros usos
}
?>

<section class="vh-100" style="background-color: #4361D1;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="https://storage.needpix.com/rsynced_images/fashion-3497408_1280.jpg"
                                alt="login form" class="img-fluid"
                                style="border-radius: 1rem 0 0 1rem; max-height: 550px;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">


                                <form action="controllers/login.controller.php" method="post">

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <img src="assets/logo-icon-black.png" alt="logo"
                                            style="width: 2em; height: 2em;" />
                                        <span class="h2 fw-bold mb-0">SHOP</span>

                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicia sesion en tu
                                        cuenta</h5>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="form2Example17" name="email"
                                            class="form-control form-control-lg" required />
                                        <label class="form-label" for="form2Example17">Correo electrónico</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="form2Example27" name="password"
                                            class="form-control form-control-lg" required />
                                        <label class="form-label" for="form2Example27">Contraseña</label>
                                        <?php if (isset($error_message)): ?>
                                        <div class="alert alert-danger"><?php echo $error_message; ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-primary btn-lg btn-block" id="orange"
                                            type="submit">Login</button>
                                    </div>
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">No tienes cuenta? <a
                                            href="signup.php" style="color: #393f81;">Registrate aqui</a></p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</html>