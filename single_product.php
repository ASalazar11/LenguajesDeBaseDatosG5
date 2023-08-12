<!DOCTYPE html>
<html>

<head>
    <title>Product Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="components/navbar/navbar.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include 'components/navbar/navbar.php';
    ?>
    <br>
    <div class="container">
        <h1>Detalles del producto</h1>
        <?php
        // Connect to MySQL database
        require_once 'DAL/connection.php';
        require_once 'DAL/products.php';

        // Get product ID from query string
        $id = $_GET['id'];

        // Retrieve product details from database
        $result = getProductById($id);

        // Display product details
        if (!empty($result)) {
            foreach ($result as $row) {
                echo '<div class="card">';
                echo '<img width="200px" style="max-height:300px;" src="' . $row['IMAGE'] . '">';
                echo '<div class="card-body">';
                echo '<h4 class="card-title">' . $row['NAME'] . '</h4>';
                echo '<p class="card-text"><strong>Descripcion: </strong>' . $row['DESCRIPTION'] . '</p>';
                echo '<p class="card-text"><strong>Precio:</strong> $' . $row['PRICE'] . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>Producto no encontrado</p>';
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="components/navbar/navbar.js"></script>
    <script type="module" src="components/cardProduct/card.js"></script>
</body>


</html>