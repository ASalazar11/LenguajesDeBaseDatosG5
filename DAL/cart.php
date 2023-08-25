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

    $stmt = oci_parse($connection, "BEGIN create_cart_proc(:user_id, :cart_id); END;");
    oci_bind_by_name($stmt, ':user_id', $user_id);
    oci_bind_by_name($stmt, ':cart_id', $cartId, 32); // Assuming the ID won't exceed 32 characters.

    $response = oci_execute($stmt);

    if ($response) {
        oci_commit($connection); // Commit the transaction to make sure the data is persisted.
        $_SESSION['cart'] = $cartId; // Store cart_id directly in the session.
    }

    oci_free_statement($stmt);
    oci_close($connection);

    return $cartId; // Return the cart_id directly.
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

    $query = "BEGIN GET_CART_ID_PROC(:user_id, :cart_id); END;";
    $stmt = oci_parse($connection, $query);

    oci_bind_by_name($stmt, ":user_id", $user_id);
    oci_bind_by_name($stmt, ":cart_id", $cart_id, 32); // Assuming 32 is the max length of the cart_id

    oci_execute($stmt);

    if ($cart_id !== null) {
        $response = $cart_id;
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

    $query = "BEGIN DELETE_CART_ITEMS(:cart_id); END;";
    $stmt = oci_parse($connection, $query);

    oci_bind_by_name($stmt, ":cart_id", $cart_id);

    if (oci_execute($stmt)) {
        $response = true;
    }

    oci_free_statement($stmt);
    oci_close($connection);

    return $response;
}

