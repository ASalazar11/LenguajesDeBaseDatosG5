<?php

require '../include/functions/getRequests.php';

$email = recogePost("email");
$password = recogePost("password");

$emailOK = false;
$passwordOK = false;

$errores = [];

//Validar que el email no este vacio
if ($email === "") {
    $errores[] = "Error";
} else {
    $emailOK = true;
}
//Validar que las password no esten vacias
if (isset($password)) {
    $passwordOK = true;
} else {
    $errores[] = "Error";
}

// Si ambos campos son válidos, intentar ingresar los datos en la base de datos
if ($emailOK && $passwordOK) {
    require '../DAL/user.php';
    // Si la inserción es exitosa, redireccionar al usuario al resultado
    session_start();
    if (login($email, $password)) {
        header("Location: ../home.php");
    } else {
        $_SESSION['error_message'] = "Correo electrónico o contraseña incorrectos.";
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }
}
