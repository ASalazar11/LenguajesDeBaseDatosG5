<?php

require_once '../../DAL/cart.php';
require_once '../../DAL/cart_item.php';
session_start();
$cart = $_SESSION['cart'];
$cart_id = $cart;
$user = $_SESSION['user'];
$user_id = $_SESSION['user']['USER_ID'];

if ($cart_id == null) {
    $cart = createCart($user_id);
    $cart_id = $cart['cart_id'];
}

$cart_items = getAllCartItemsByCartId($cart_id);

$data = json_encode($cart_items);

echo $data;
