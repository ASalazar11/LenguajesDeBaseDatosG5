<?php

require_once '../../DAL/cart.php';
require_once '../../DAL/cart_item.php';


$id = $_POST['id'];
$id = intval($id);

$cart_id = $_POST['cart_id'];

$product_id = $id;
$addNQuantity = 1;
if (addToCart($cart_id, $product_id, $addNQuantity)) {
    $cart_items = getAllCartItemsByCartId($cart_id);
    
    echo json_encode($cart_items);
} else {
    echo json_encode(['status' => 'fail']);
}


