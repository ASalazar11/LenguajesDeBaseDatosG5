<?php

function createItem($cart_id, $product_id, $quantity, $connection)
{
    $response = false;

    // Obtener el siguiente valor de la secuencia para CART_ITEM_ID
    $stmt = oci_parse($connection, "SELECT cart_items_seq.NEXTVAL FROM DUAL");
    oci_execute($stmt);
    oci_fetch($stmt);
    $cart_item_id = oci_result($stmt, 1);
    oci_free_statement($stmt);

    $query = "INSERT INTO cart_items (cart_item_id, cart_id, product_id, quantity) 
              VALUES (:cart_item_id, :cart_id, :product_id, :quantity)";
    $stmt = oci_parse($connection, $query);
    oci_bind_by_name($stmt, ':cart_item_id', $cart_item_id);
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
    $query = "UPDATE cart_items SET quantity = :quantity WHERE cart_id = :cart_id AND product_id = :product_id";
    $stmt = oci_parse($connection, $query);
    oci_bind_by_name($stmt, ':quantity', $quantity);
    oci_bind_by_name($stmt, ':cart_id', $cart_id);
    oci_bind_by_name($stmt, ':product_id', $product_id);

    $response = oci_execute($stmt);

    if ($response) {
        $rowsAffected = oci_num_rows($stmt);
        if ($rowsAffected > 0) {
            oci_commit($connection); // Commit the transaction to make sure the update is applied.
            return true; // Se actualizó correctamente.
        } else {
            return false; // No se encontró el elemento con los valores proporcionados.
        }
    } else {
        $error = oci_error($stmt);
        echo "Error: " . $error['message'];
        return false; // Ocurrió un error al ejecutar la consulta.
    }
}



function getAllCartItemsByCartId($cart_id)
{
    $response = false;
    $connection = Conecta();
    
    $query = "SELECT products.product_id, products.name, products.description, products.price, cart_items.quantity
              FROM cart_items
              JOIN products ON cart_items.product_id = products.product_id
              WHERE cart_items.cart_id = :cart_id";
    $stmt = oci_parse($connection, $query);
    oci_bind_by_name($stmt, ':cart_id', $cart_id);

    $response = oci_execute($stmt);

    //items array of the cart
    $rows = array();

    if ($response) {
        while ($row = oci_fetch_assoc($stmt)) {
            $new_row = $row;
            array_push($rows, $new_row);
        }
    } else {
        $error = oci_error($stmt);
        echo "Error: " . $error['message'];
    }

    oci_free_statement($stmt);
    oci_close($connection);

    return $rows;
}

