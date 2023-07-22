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
    <link rel="stylesheet" type="text/css" href="css/Estilo2.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    

        <link rel="stylesheet" type="text/css" href="components/navbar/navbar.css">
    
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />

</head>

<body>
    <?php

    include 'components/preNavbar/index.php';
    
    ?>

    

    <div>
        <div class="titulo" href="">SHOP</div>
    </div>


    <div class="top container">
        <form action="php2/procesar-formulario.php" method="post" class="row g-3 needs-validation" novalidate>
            <h2 class="imagen">Contáctenos</h2>
            <div class="col-md-4">
                <div class="form-outline">
                    <input type="text" class="form-control" name="nombre" id="nombre" required />
                    <label for="nombre" class="form-label">Nombre</label>
                    <div class="invalid-feedback">No ha digitado el nombre</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-outline">
                    <input type="text" class="form-control" name="apellidos" id="apellidos" required />
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <div class="invalid-feedback">No ha digitado sus apellidos</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group form-outline">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="email" class="form-control" name="correo" id="correo" aria-describedby="inputGroupPrepend"
                        required />
                    <label for="validationCustomUsername" class="form-label">Correo</label>
                    <div class="invalid-feedback">Digite su correo. Recuerde que tiene que contener un @</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline">
                    <input type="text" class="form-control" name="ciudad" id="ciudad" required />
                    <label for="ciudad" class="form-label">Ciudad</label>
                    <div class="invalid-feedback">Proporcione una ciudad.</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline">
                    <textarea id="mensaje" class="form-control" name="mensaje" class="form-control" rows="5"
                        required></textarea>
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <div class="invalid-feedback">Digite el mensaje</div>

                </div>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required />
                    <label class="form-check-label" for="invalidCheck">Acepto los términos y condiciones</label>
                    <div class="invalid-feedback">Requerido los terminos y condiciones</div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
            <div class="container col-md-6">
                <p>¿Tiene preguntas o comentarios? No dude en ponerse en contacto con nosotros.</p>
                <ul>
                    <li><i class="fas fa-phone"></i> +(506) 8555-5555</li>
                    <li><i class="fas fa-envelope"></i> whycuxcr@ejemplo.com</li>
                    <li><i class="fas fa-map-marker-alt"></i> San Jose, San Pedro, Costa Rica</li>
                </ul>
            </div>
        </form>

    </div>

    <?php
    include 'components/footer/footer.php';
    ?>
    


    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript"></script>
    <script src="js/contactenos.js"></script>
    <script type="module" src="components/navbar/navbar.js"></script>

</body>

</html>