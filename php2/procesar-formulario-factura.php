<?php

require_once '../include/functions/getRequests.php';
require_once '../DAL/cart.php';

$nombre = recogePost('nombre');
$apellidos = recogePost('apellidos');
$correo = recogePost('correo');
$ciudad = recogePost('ciudad');
$tarjeta = recogePost('tarjeta');
$codigo = floatval(recogePost('codigo'));
$total = floatval(recogePost('total'));


$nombreOK = false;
$apellidosOK = true;

$errores = [];

if ($nombre === '') {
    $errores[] = 'No se digitó el nombre de la persona';
} else {
    $nombreOK = true;
}

if ($nombreOK && $apellidosOK) {
    session_start();
    require_once '../DAL/Factura.php';
    if (IngresaFactura($nombre, $apellidos, $correo, $ciudad, $tarjeta, $codigo, $total)) { // Usamos la función IngresaFactura

        $cart = null;

        if (!isset($_SESSION['cart'])) {
            $cart = createCart($user_id);
        } else {
            $cart = $_SESSION['cart'];
        }

        $cart_id = $cart;

        // El identificador del carrito que deseas eliminar
        $result = deleteCartItems($cart_id);

        if ($result) {
            echo 'El carrito se ha eliminado correctamente.';
            header('Location: ../Factura_Pdf.php');
        } else {
            echo 'Error al eliminar el carrito.';
        }

        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] === false) {
            echo 'La sesión está cerrada. No se puede redirigir al índice.';
        } else {
            header('Location: ../home.php');
            exit;
        }
    }
}

?>