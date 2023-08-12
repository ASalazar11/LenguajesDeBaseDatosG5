<?php
require_once "connection.php";

function IngresaFactura($pNombre, $pApellidos, $pCorreo, $pCiudad, $pTarjeta, $pCodigo, $pTotal)
{
    $retorno = false;
    $conexion = Conecta(); // Usar la función de conexión para Oracle

    // Convertir el valor de código a número
    $codigoNumerico = intval($pCodigo);

    // Convertir el valor de total a número decimal
    $totalDecimal = floatval($pTotal);

    $stmt = oci_parse($conexion, "INSERT INTO factura(nombre, apellidos, correo, ciudad, tarjeta, codigo, total) VALUES (:nombre, :apellidos, :correo, :ciudad, :tarjeta, :codigo, :total)");

    // Crear variables para enlazar los valores
    $nombre = $pNombre;
    $apellidos = $pApellidos;
    $correo = $pCorreo;
    $ciudad = $pCiudad;
    $tarjeta = $pTarjeta;
    $codigo = $codigoNumerico; // Usar el valor convertido a número
    $total = $totalDecimal; // Usar el valor convertido a número decimal
    
    oci_bind_by_name($stmt, ":nombre", $nombre);
    oci_bind_by_name($stmt, ":apellidos", $apellidos);
    oci_bind_by_name($stmt, ":correo", $correo);
    oci_bind_by_name($stmt, ":ciudad", $ciudad);
    oci_bind_by_name($stmt, ":tarjeta", $tarjeta);
    oci_bind_by_name($stmt, ":codigo", $codigo);
    oci_bind_by_name($stmt, ":total", $total);
    
    if (oci_execute($stmt)) {
        $retorno = true;
    }
    
    oci_free_statement($stmt);
    Desconecta($conexion);

    return $retorno;
}

function EliminarFactura($idDato)
{
    $retorno = false;
    $conexion = Conecta(); // Usar la función de conexión para Oracle

    $stmt = oci_parse($conexion, "DELETE FROM factura WHERE factura_id = :id");
    oci_bind_by_name($stmt, ":id", $idDato);
    
    if (oci_execute($stmt)) {
        $retorno = true;
    }
    
    oci_free_statement($stmt);
    Desconecta($conexion);

    return $retorno;
}
?>
