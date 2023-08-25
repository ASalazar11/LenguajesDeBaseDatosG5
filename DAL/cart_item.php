<?php

function createItem($cart_id, $product_id, $quantity, $connection)
{
    $response = false;

    $query = "BEGIN
                INSERT_CART_ITEM(:cart_id, :product_id, :quantity);
              END;";
              
    $stmt = oci_parse($connection, $query);
    oci_bind_by_name($stmt, ':cart_id', $cart_id);
    oci_bind_by_name($stmt, ':product_id', $product_id);
    oci_bind_by_name($stmt, ':quantity', $quantity);

    $response = oci_execute($stmt);

    if ($response) {
        oci_commit($connection); // Commit the transaction to make sure the insertion is applied.
        return true;
    } else {
        $error = oci_error($stmt);
        echo "Error: " . $error['message'];
        return false;
    }
}



function updateItem($cart_id, $product_id, $quantity, $connection)
{
    $stmt = oci_parse($connection, "BEGIN update_cart_item(:cart_id, :product_id, :quantity, :result); END;");

    oci_bind_by_name($stmt, ':cart_id', $cart_id);
    oci_bind_by_name($stmt, ':product_id', $product_id);
    oci_bind_by_name($stmt, ':quantity', $quantity);
    oci_bind_by_name($stmt, ':result', $rowsAffected, 10); // Número de filas afectadas

    $response = oci_execute($stmt);

    if ($response) {
        if ($rowsAffected > 0) {
            oci_commit($connection);
            return true;
        } else {
            return false;
        }
    } else {
        $error = oci_error($stmt);
        echo "Error: " . $error['message'];
        return false;
    }
}




function getAllCartItemsByCartId($cart_id)
{
    $response = false;
    $connection = Conecta();
    
    // Preparar la llamada al procedimiento almacenado
    $query = "BEGIN
    GetCartItemsByCartId(:cart_id, :result_cursor);
              END;";
    $stmt = oci_parse($connection, $query);
    
    // Variables de enlace para el procedimiento almacenado
    $result_cursor = oci_new_cursor($connection);
    
    oci_bind_by_name($stmt, ':cart_id', $cart_id);
    oci_bind_by_name($stmt, ':result_cursor', $result_cursor, -1, OCI_B_CURSOR);

    $response = oci_execute($stmt);
    
    // Ejecutar el cursor
    oci_execute($result_cursor);

    //items array del carrito
    $rows = array();

    if ($response) {
        while ($row = oci_fetch_assoc($result_cursor)) {
            $new_row = $row;
            array_push($rows, $new_row);
        }
    } else {
        $error = oci_error($stmt);
        echo "Error: " . $error['message'];
    }

    oci_free_statement($stmt);
    oci_free_statement($result_cursor);
    oci_close($connection);

    return $rows;
}


