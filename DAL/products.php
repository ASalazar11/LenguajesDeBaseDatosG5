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

    // Preparar la llamada al procedimiento almacenado
    $query = "BEGIN GetProductByIdProc(:id, :cursor); END;";
    $statement = oci_parse($connection, $query);

    oci_bind_by_name($statement, ":id", $id);
    $cursor = oci_new_cursor($connection);
    oci_bind_by_name($statement, ":cursor", $cursor, -1, OCI_B_CURSOR);

    oci_execute($statement);
    oci_execute($cursor);

    $response = array();

    if (($row = oci_fetch_assoc($cursor)) !== false) {
        $response[] = $row;
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
    $response = false;
    $connection = Conecta();

    // Preparar la llamada al procedimiento almacenado
    $query = "BEGIN FilterProductsByNameProc(:name, :cursor); END;";
    $statement = oci_parse($connection, $query);

    oci_bind_by_name($statement, ":name", $name);
    $cursor = oci_new_cursor($connection);
    oci_bind_by_name($statement, ":cursor", $cursor, -1, OCI_B_CURSOR);

    oci_execute($statement);
    oci_execute($cursor);

    if (($row = oci_fetch_assoc($cursor)) !== false) {
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
    $response = false;
    $connection = Conecta();

    // Preparar la llamada al procedimiento almacenado
    $query = "BEGIN GetProductsByCartIdProc(:id, :cursor); END;";
    $statement = oci_parse($connection, $query);

    oci_bind_by_name($statement, ":id", $id);
    $cursor = oci_new_cursor($connection);
    oci_bind_by_name($statement, ":cursor", $cursor, -1, OCI_B_CURSOR);

    oci_execute($statement);
    oci_execute($cursor);

    $rows = array();

    while (($row = oci_fetch_assoc($cursor)) !== false) {
        $rows[] = $row;
    }

    Desconecta($connection);
    return $rows;
}


function EliminarProducto($idDato)
{
    $retorno = false;
    $conexion = conecta();

    if ($conexion) {
        $query = "BEGIN EliminaProducto(:pProductoId); END;";
        $stmt = oci_parse($conexion, $query);

        oci_bind_by_name($stmt, ":pProductoId", $idDato);

        if (oci_execute($stmt)) {
            $retorno = true;
        }
        oci_free_statement($stmt);
        oci_close($conexion);
    }

    return $retorno;
}




