<?php


require_once '../include/functions/getRequests.php';

$id = $_GET['id'];

require_once '../DAL/user.php';
    if (EliminarUsuario($id)){
        header("Location: ../consulta-datos.php");
    }
?>