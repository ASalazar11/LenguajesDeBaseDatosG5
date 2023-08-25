<?php


require_once '../include/functions/getRequests.php';

$id = $_GET['id'];

require_once '../DAL/products.php';
    if (EliminarProducto($id)){
        header("Location: ../consulta-datos.php");
    }
?>