<?php

require_once "connection.php";

// session_destroy();
// session_start();

function login($email, $password)
{
    $response = false;
    $connection = Conecta();

    // Utilizar una consulta preparada con marcadores de parámetros
    $query = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = oci_parse($connection, $query);

    // Asignar valores a los marcadores de parámetros
    oci_bind_by_name($stmt, ":email", $email);
    oci_bind_by_name($stmt, ":password", $password);

    // Ejecutar la consulta
    oci_execute($stmt);

    // Obtener el resultado de la consulta
    oci_fetch_all($stmt, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);

    // Verificar si se encontró un usuario válido
    if (count($result) > 0) {
        $row = reset($result); // Obtener el primer resultado
        $_SESSION['user'] = $row;
        $user_id = $_SESSION['user']['USER_ID']; // Reemplaza 'USER_ID' con el nombre real de la columna
        $response = true;
    }

    // Cerrar la consulta y desconectar
    oci_free_statement($stmt);
    Desconecta($connection);

    return $response;
}

function register($username, $password, $email)
{
    $response = false;
    $connection = Conecta();

    // Check if the user with this email already exists
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = oci_parse($connection, $query);
    oci_bind_by_name($stmt, ":email", $email);
    oci_execute($stmt);
    oci_fetch_all($stmt, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);

    if (count($result) > 0) {
        // User with this email already exists
        oci_free_statement($stmt);
        Desconecta($connection);
        return false;
    }

    // Insert the new user data into the database
    $query = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
    $stmt = oci_parse($connection, $query);
    oci_bind_by_name($stmt, ":username", $username);
    oci_bind_by_name($stmt, ":password", $password);
    oci_bind_by_name($stmt, ":email", $email);
    $insert = oci_execute($stmt);

    // If the insert is successful, log the user in and create their cart
    if ($insert) {
        $user_id = oci_insert_id($connection); // Reemplaza 'USER_ID' con el nombre real de la columna
        $_SESSION['user'] = array(
            'USER_ID' => $user_id, // Reemplaza 'USER_ID' con el nombre real de la columna
            'USERNAME' => $username, // Reemplaza 'USERNAME' con el nombre real de la columna
            'EMAIL' => $email // Reemplaza 'EMAIL' con el nombre real de la columna
        );
        createCart($user_id);
        $response = true;
    }

    // Cerrar la consulta y desconectar
    oci_free_statement($stmt);
    Desconecta($connection);

    return $response;
}