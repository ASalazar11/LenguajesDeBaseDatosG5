<?php

require_once "connection.php";

// session_destroy();
// session_start();

function login($email, $password)
{
    $response = false;
    $connection = Conecta();

    $query = "BEGIN LOGIN_PROCEDURE(:email, :password, :cursor); END;";
    $stmt = oci_parse($connection, $query);

    $cursor = oci_new_cursor($connection);

    oci_bind_by_name($stmt, ":email", $email);
    oci_bind_by_name($stmt, ":password", $password);
    oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);

    oci_execute($stmt);
    oci_execute($cursor);

    $result = [];
    oci_fetch_all($cursor, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);

    oci_free_statement($stmt);
    oci_free_statement($cursor);

    if (count($result) > 0) {
        $row = reset($result);
        $_SESSION['user'] = $row;
        $user_id = $_SESSION['user']['USER_ID'];
        $response = true;
    }

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