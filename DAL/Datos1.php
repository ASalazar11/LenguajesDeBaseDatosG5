<?php

require_once "connection.php";

function Ingresa($pNombre, $papellidos, $pcorreo, $pciudad, $pmensaje)
{
    $retorno = false;
    $conexion = Conecta();

    //formato de datos utf8
    if(mysqli_set_charset($conexion, "utf8")){
        $stmt = $conexion->prepare("Insert into contactenos(nombre, apellidos, correo, ciudad, mensaje) values (?,?,?,?,?)");
        $stmt->bind_param("sssss", $iNombre, $iapellidos, $pcorreo, $pciudad, $pmensaje);

        //set parametros y ejecutar
        $iNombre = $pNombre;
        $iapellidos = $papellidos;
        $icorreo = $pcorreo;
        $iciudad = $pciudad;
        $imensaje = $pmensaje;

        if($stmt->execute()){
            $retorno = true;
        }
    }
    Desconecta($conexion);

    return $retorno;
}

function Eliminar($iddato)
{
    $retorno = false;
    $conexion = Conecta();

    //formato de datos utf8
    if(mysqli_set_charset($conexion, "utf8")){
        $stmt = $conexion->prepare("delete from contactenos WHERE contactenos_id = ?");
        $stmt->bind_param("i", $id);

        //set parametros y ejecutar
        $id = $iddato;

        if($stmt->execute()){
            $retorno = true;
        }
    }
    Desconecta($conexion);

    return $retorno;
}

?>