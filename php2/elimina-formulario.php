<?php


require_once '../include/functions/getRequests.php';

$id = $_GET['id'];

require_once '../DAL/Datos1.php';
    if (EliminarContacto($id)){
        header("Location: ../consulta-datos.php");
    }
?>