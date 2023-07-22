<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whycux</title>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/Estilo.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />

    <script>

    </script>

</head>

<body>
    <?php
    include 'components/navbar/navbar.php';
    ?>
    
    <div>
        <div class="titulo" href="">SHOP</div>
    </div>


    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1>Bienvenido a nuestra tienda de ropa</h1>
                    <p>Aquí encontrarás las últimas tendencias en moda a precios asequibles.</p>
                    <a href="products.php" class="btn btn-primary">Ver Productos</a>
                </div>
                <div class="col-md-6">
                    <img src="Imagenes/Inicio.jpg" alt="Imagen de la Tienda">
                </div>
            </div>
        </div>
    </section>

    <!-- Destacados Section -->
    <section class="destacados">
        <div class="container">
            <h2>Productos Destacados</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="Imagenes/nike.png" class="card-img-top" alt="Producto Destacado">
                        <div class="card-body">
                            <h5 class="card-title">Camisa de Nike</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                                aliquam orci. Vestibulum nec eros vel nisl malesuada facilisis.</p>
                            <a href="#" class="btn btn-primary">Comprar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="Imagenes/nike.png" class="card-img-top" alt="Producto Destacado">
                        <div class="card-body">
                            <h5 class="card-title">Camisa de Nike</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                                aliquam orci. Vestibulum nec eros vel nisl malesuada facilisis.</p>
                            <a href="#" class="btn btn-primary">Comprar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="Imagenes/nike.png" class="card-img-top" alt="Producto Destacado">
                        <div class="card-body">
                            <h5 class="card-title">Camisa de Nike</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                                aliquam orci. Vestibulum nec eros vel nisl malesuada facilisis.</p>
                            <a href="#" class="btn btn-primary">Comprar</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="titulo-t">REACTIVIDAD PARA CAMINAR A TU MANERA</div>



        </div>
    </section>
    
    <br>
    <div class="fondo-color">
    <div class="video-container">
        <video src="video/video.mp4" autoplay muted loop onclick="redirect()"></video>
    </div>

    </div>
    




    <?php
    include 'components/footer/footer.php';
    ?>

    <script>
    function redirect() {
        window.location.href = "products.php";
    }
    </script>

    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript"></script>

</body>

</html>