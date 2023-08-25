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
    <link rel="stylesheet" type="text/css" href="components/cardProduct/card.css">
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
</head>

<body>
    <?php
    include 'components/navbar/navbar.php';
    ?>
    <br>
    <div class="container">
        <h2>Finalizar compra</h1>
            <br><br>
            <h3>Productos agregados a su carrito</h3>
            <br>
            <?php

            require_once "DAL/products.php";
            require_once 'DAL/cart.php';

            $cart = null;

            if (!isset($_SESSION['cart'])) {
                $cart = createCart($user_id);
            } else {
                $cart = $_SESSION['cart'];
            }
            
            $cart_id = $cart;
            $products = getProductsByCartId($cart_id);
            echo "<div class='row'>";
            if (!empty($products)) {
                foreach ($products as $row) {
                    echo "<div class='col-auto'>";
                    echo "<div class='card'>";
                    echo "<div class='card-body text-center mx-auto'>";
                    echo "<img class='mx-auto img-thumbnail' src='{$row['IMAGE']}' width='50px' height='auto' style='min-height:75px;' />";
                    echo "<div class='cvp'>";
                    echo "<h5 class='card-title'>{$row['NAME']}</h5>";
                    echo "<p class='card-text'>$ {$row['PRICE']}</p>";
                    // echo "<button class='btn btn-danger delete-product' data-product-id='{$row['PRODUCT_ID']}'><i class='fas fa-trash'></i></button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<h1>NO HAY PRODUCTOS</h1>";
            }
            echo "</div>";
            
            ?>
            <br>
            <!-- HTML -->
            <h4 class="total">Total: <span class="total-price"></span></h4>

            <br>
            <a href="pago.php"><button href="pago.php" class="btn btn-primary">Completar compra</button></a>


    </div>

    <script src="script.js"></script>
</body>

</html>