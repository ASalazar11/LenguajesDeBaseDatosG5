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
    $connection = conecta();

    if ($connection) {
        $query = "BEGIN RegistarUsuario(:username, :password, :email); END;";
        $stmt = oci_parse($connection, $query);

        oci_bind_by_name($stmt, ":username", $username);
        oci_bind_by_name($stmt, ":password", $password);
        oci_bind_by_name($stmt, ":email", $email);

        if (oci_execute($stmt)) {
            // User was successfully registered
            // Log the user in and create their cart
            $_SESSION['user'] = array(
                'USERNAME' => $username,
                'EMAIL' => $email
            );
            $response = true;
        }

        oci_free_statement($stmt);
        oci_close($connection);
    }

    return $response;
}


function EliminarUsuario($idDato)
{
    $retorno = false;
    $conexion = conecta();

    if ($conexion) {
        $query = "BEGIN EliminaUsuario(:pUserId); END;";
        $stmt = oci_parse($conexion, $query);

        oci_bind_by_name($stmt, ":pUserId", $idDato);

        if (oci_execute($stmt)) {
            $retorno = true;
        }
        oci_free_statement($stmt);
        oci_close($conexion);
    }

    return $retorno;
}


?>