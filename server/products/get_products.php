<link rel="stylesheet" type="text/css" href="components/cardProduct/card.css">
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<?php
require_once '../../DAL/categories.php';

require_once '../../DAL/products.php';
require_once '../../DAL/cart.php';
session_start();
$category_id = $_GET['category_id'];
$products = getProductsByCategory($category_id);

$user_id = $_SESSION['user']['user_id'];

$cart = null;

if (!isset($_SESSION['cart'])) {
    $cart = createCart($user_id);
} else {
    $cart = $_SESSION['cart'];
}

$cart_id = $cart['cart_id'];

echo "<div class='container-fluid'>";
echo "<div class='row'>";

if ($products->num_rows > 0) {


    while ($row = $products->fetch_assoc()) {


        echo "<div class='col-md-4'>";

        echo  "  <div class='card mx-auto col-md-3 col-10 mt-5'>";
        echo  "  <img class='mx-auto img-thumbnail' src='https://images.teemill.com/k5rc7zgxhkkhb5uzf0xipuy2kkks5oksoqmmpafcxfgpod8z.png.webp?w=1080&v=2' width='250px' height='auto' />";
        echo  "  <div class='card-body text-center mx-auto'>";
        echo  "      <div class='cvp'>";
        echo  "          <h5 class='card-title font-weight-bold'>{$row['name']}</h5>";
        echo  "      <p class='card-text'>CRC  {$row['price']}</p>";
        echo  "       <button class='btn details px-auto' id='detalles' data-id='{$row['product_id']}' style='background-color: #42465A; color: white;'>ver detalles</button><br />";
        echo  "        <button class='btn cart px-auto' data-id='{$row['product_id']}' data-cart_id='$cart_id'>AGREGAR EN EL CARRITO</button>";
        echo  "     </div>";
        echo  "  </div>";
        echo "  </div>";
        echo "</div>";
    }
} else {
    echo "<h1>NO HAY PRODUCTOS</h1>";
}
echo "</div>";
echo "</div>";



?>

<script type="module" src="components/cardProduct/card.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="module" src="components/navbar/navbar.js"></script>