<?php
require_once "connection.php";

function getAllProducts()
{
    $response = array();
    $conn = Conecta();

    // Preparar la llamada al procedimiento almacenado
    $sql = "BEGIN get_all_products(:cursor); END;";
    $stmt = oci_parse($conn, $sql);

    // Crear el cursor para recibir los resultados del procedimiento
    $cursor = oci_new_cursor($conn);

    // Vincular el cursor como parámetro de salida
    oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);

    // Ejecutar el procedimiento almacenado
    oci_execute($stmt);

    // Recuperar los resultados del cursor
    oci_execute($cursor);

    // Obtener el resultado de la consulta
    while ($row = oci_fetch_array($cursor, OCI_ASSOC + OCI_NUM)) {
        $response[] = $row;
    }

    // Cerrar el cursor y la consulta preparada
    oci_free_cursor($cursor);
    oci_free_statement($stmt);

    // Desconectar
    Desconecta($conn);

    return $response;
}

function getProductById($id)
{
    $response = false;
    $connection = Conecta();

    $query = "SELECT * FROM products WHERE product_id = :id";
    $statement = oci_parse($connection, $query);
    oci_bind_by_name($statement, ":id", $id);
    oci_execute($statement);

    $response = array(); // Initialize the response array

    if (($row = oci_fetch_array($statement, OCI_ASSOC + OCI_NUM)) !== false) {
        // Convert the Oracle associative array to a regular associative array
        $row_assoc = array();
        foreach ($row as $key => $value) {
            // Remove the numeric indexes from the Oracle result
            if (is_string($key)) {
                $row_assoc[$key] = $value;
            }
        }

        $response[] = $row_assoc; // Add the converted row to the response array
    } else {
        $error = oci_error($statement);
        echo $error['message'];
        return false;
    }

    Desconecta($connection);
    return $response;
}


function filterProductsByName($name)
{
    $response =  false;
    $connection = Conecta();

    $query = "SELECT * FROM products WHERE name LIKE '%' || :name || '%' AND ROWNUM <= 1";
    $statement = oci_parse($connection, $query);
    oci_bind_by_name($statement, ":name", $name);
    oci_execute($statement);

    if (($row = oci_fetch_assoc($statement)) !== false) {
        $response = $row;
    } else {
        $error = oci_error($statement);
        echo $error['message'];
        return false;
    }

    Desconecta($connection);
    return $response;
}

function getProductsByCartId($id)
{
    $response =  false;
    $connection = Conecta();

    $query = "SELECT products.*
    FROM products
    JOIN cart_items ON cart_items.product_id = products.product_id
    WHERE cart_items.cart_id = :id";
    $statement = oci_parse($connection, $query);
    oci_bind_by_name($statement, ":id", $id);
    oci_execute($statement);

    $rows = array();

    while ($row = oci_fetch_assoc($statement)) {
        $rows[] = $row;
    }

    Desconecta($connection);
    return $rows;
}



