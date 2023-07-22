<?php

require_once '../include/functions/getRequests.php';
require_once '../DAL/products.php';

// Retrieve the product name from the AJAX request
$productName = recogePost("productName");

// Retrieve all products from the database that match the product name

if ($result = filterProductsByName($productName)) {
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            header("Location: ../single_product.php?id={$row['product_id']}");
        }
    }
} else {
    echo json_encode([]);
}
