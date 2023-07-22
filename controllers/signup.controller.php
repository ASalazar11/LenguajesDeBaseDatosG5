Sure, here's the modified code for sign up that only asks for username, email, and password:

<?php

require '../include/functions/getRequests.php';

$username = recogePost("username");
$email = recogePost("email");
$password = recogePost("password");

$usernameOK = false;
$emailOK = false;
$passwordOK = false;

$errores = [];

// Validar que el username no esté vacío
if ($username === "") {
    $errores[] = "Error";
} else {
    $usernameOK = true;
}

// Validar que el email no esté vacío y sea válido
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailOK = true;
} else {
    $errores[] = "Error";
}

// Validar que la contraseña no esté vacía
if (isset($password)) {
    $passwordOK = true;
} else {
    $errores[] = "Error";
}

// Si todos los campos son válidos, intentar registrar al usuario en la base de datos
if ($usernameOK && $emailOK && $passwordOK) {
    require_once '../DAL/user.php';
    // Si el registro es exitoso, redireccionar al usuario a la página de inicio
    if (register($username, $password, $email)) {
        header("Location: ../home.php");
    }
}
