<?php


require_once '../../DAL/cart.php';
require_once '../../DAL/cart_item.php';

session_start();
$user = $_SESSION['user'];
$user_id = $user['user_id'];
$connection = Conecta();

// Crear o obtener el ID del carrito
$cart_id = $_SESSION['cart']['cart_id'];
if ($cart_id == null) {
    $cart_id = createCart($user_id, $connection);
    $_SESSION['cart']['cart_id'] = $cart_id;
}

// Obtener los elementos del carrito
$cart_items = getAllCartItemsByCartId($cart_id);

// Obtener los detalles de los productos en el carrito
$products = array();
foreach ($cart_items as $item) {
    $product_id = $item['PRODUCT_ID'];
    $product = getProductById($product_id);
    $product['QUANTITY'] = $item['QUANTITY'];
    $products[] = $product;
}

$data = json_encode($products);

echo $data;

Desconecta($connection);
