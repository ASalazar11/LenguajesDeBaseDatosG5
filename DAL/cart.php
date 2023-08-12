<?php

// require '../models/cart.model.php';
require_once 'connection.php';
require_once 'cart_item.php';

/**
 * It inserts a new row into the cart_items table.
 * 
 * @param cart_id 1
 * @param product_id 1
 * @param quantity 1
 * 
 * @return The result of the query.
 */
function addToCart($cart_id, $product_id, $quantity)
{
    $response = false;
    $connection = Conecta();

    if ($connection) {
        //if not exists, create a new cart, then update return true if already exists
        if (!updateItem($cart_id, $product_id, $quantity, $connection)) {
            $response = createItem($cart_id, $product_id, $quantity, $connection);
        }
    } else {
        print("Error: ");
    }

    Desconecta($connection);

    return $response;
}

/**
 * It creates a new cart for a user.
 * 
 * @param user_id The user's id
 * 
 * @return The result of the query.
 */
function createCart($user_id)
{
    $response = false;
    $connection = Conecta();

    if (!$connection) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    $stmt = oci_parse($connection, "INSERT INTO carts (cart_id, user_id) VALUES (carts_seq.NEXTVAL, :user_id)");
    oci_bind_by_name($stmt, ':user_id', $user_id);

    $response = oci_execute($stmt);

    if ($response) {
        $cartId = getLastInsertedId($connection);
        oci_commit($connection); // Commit the transaction to make sure the data is persisted.
        $_SESSION['cart'] = $cartId; // Store cart_id directly in the session.
    }

    oci_free_statement($stmt);
    oci_close($connection);

    return $cartId; // Return the cart_id directly.
}



function getLastInsertedId($connection)
{
    $stmt = oci_parse($connection, "SELECT carts_seq.CURRVAL FROM DUAL");
    oci_execute($stmt);
    oci_fetch($stmt);
    $lastId = oci_result($stmt, 1);
    oci_free_statement($stmt);
    return $lastId;
}


/**
 * It gets the cart id of a user.
 * 
 * @param user_id The user's id
 * @param cart_id The user's id
 * 
 * @return The result of the query.
 */
function getCartId($user_id, $cart_id)
{
    $response = false;
    $connection = Conecta();

    $query = "SELECT cart_id FROM carts WHERE user_id = :user_id AND cart_id = :cart_id";
    $stmt = oci_parse($connection, $query);

    oci_bind_by_name($stmt, ":user_id", $user_id);
    oci_bind_by_name($stmt, ":cart_id", $cart_id);

    oci_execute($stmt);

    if ($row = oci_fetch_assoc($stmt)) {
        $response = $row['CART_ID'];
    }

    oci_free_statement($stmt);
    oci_close($connection);

    return $response;
}

/**
 * Elimina los elementos del carrito asociados a un carrito específico.
 * 
 * @param cart_id El identificador del carrito cuyos elementos se eliminarán.
 * 
 * @return El resultado de la consulta.
 */
function deleteCartItems($cart_id)
{
    $response = false;
    $connection = Conecta();

    $query = "DELETE FROM cart_items WHERE cart_id = :cart_id";
    $stmt = oci_parse($connection, $query);

    oci_bind_by_name($stmt, ":cart_id", $cart_id);

    if (oci_execute($stmt)) {
        $response = true;
    }

    oci_free_statement($stmt);
    oci_close($connection);

    return $response;
}
