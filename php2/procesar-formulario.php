<?php

require_once '../include/functions/getRequests.php';

require_once '../DAL/cart.php';

$nombre = recogePost( 'nombre' );
$apellidos = recogePost( 'apellidos' );
$correo = recogePost( 'correo' );
$ciudad = recogePost( 'ciudad' );
$mensaje = recogePost( 'mensaje' );

$nombreOK = false;
$apellidosOK = false;

$errores = [];

if ( $nombre === '' ) {
    $errores[] = 'No se digito el nombre de la persona';
} else {
    $nombreOK = true;
}

$apellidosOK = true;

if ( $nombreOK && $apellidosOK ) {
    session_start();
    require_once '../DAL/Datos1.php';
    if ( Ingresa( $nombre, $apellidos, $correo, $ciudad, $mensaje ) ) {

        $cart = null;

        if ( !isset( $_SESSION[ 'cart' ] ) ) {
            $cart = createCart( $user_id );
        } else {
            $cart = $_SESSION[ 'cart' ];
        }

        $cart_id = $cart[ 'cart_id' ];

        // El identificador del carrito que deseas eliminar
        $result = deleteCartItems( $cart_id );

        if ( $result ) {
            echo 'El carrito se ha eliminado correctamente.';
        } else {
            echo 'Error al eliminar el carrito.';
        }

        if ( !isset( $_SESSION[ 'logged_in' ] ) || $_SESSION[ 'logged_in' ] === false ) {
            // La sesión está cerrada, realiza alguna acción aquí, como mostrar un mensaje de error o redirigir a una página específica.
            // Por ejemplo:
            echo 'La sesión está cerrada. No se puede redirigir al índice.';
            // No se realizará ninguna redirección si la sesión está cerrada.
        } else {
            header( 'Location: ../home.php' );
            exit;
        }
    }
}

?>