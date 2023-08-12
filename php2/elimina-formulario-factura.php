<?php


require_once '../include/functions/getRequests.php';

$id = $_GET['id'];

require_once '../DAL/Factura.php';
    if (Eliminar($id)){
        header("Location: ../consulta-datos.php");
    }
?>