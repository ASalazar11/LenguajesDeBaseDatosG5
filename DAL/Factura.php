<?php
require_once "connection.php";

function IngresaFactura($pNombre, $pApellidos, $pCorreo, $pCiudad, $pTarjeta, $pCodigo, $pTotal)
{
    $retorno = false;
    $conexion = conecta();

    if ($conexion) {
        $query = "BEGIN IngresaFactura(:pNombre, :pApellidos, :pCorreo, :pCiudad, :pTarjeta, :pCodigo, :pTotal); END;";
        $stmt = oci_parse($conexion, $query);

        oci_bind_by_name($stmt, ":pNombre", $pNombre);
        oci_bind_by_name($stmt, ":pApellidos", $pApellidos);
        oci_bind_by_name($stmt, ":pCorreo", $pCorreo);
        oci_bind_by_name($stmt, ":pCiudad", $pCiudad);
        oci_bind_by_name($stmt, ":pTarjeta", $pTarjeta);
        oci_bind_by_name($stmt, ":pCodigo", $pCodigo);
        oci_bind_by_name($stmt, ":pTotal", $pTotal);

        if (oci_execute($stmt)) {
            $retorno = true;
        }
        oci_free_statement($stmt);
        oci_close($conexion);
    }

    return $retorno;
}


function EliminarFactura($idDato)
{
    $retorno = false;
    $conexion = conecta();

    if ($conexion) {
        $query = "BEGIN EliminaFactura(:pIdDato); END;";
        $stmt = oci_parse($conexion, $query);

        oci_bind_by_name($stmt, ":pIdDato", $idDato);

        if (oci_execute($stmt)) {
            $retorno = true;
        }
        oci_free_statement($stmt);
        oci_close($conexion);
    }

    return $retorno;
}

?>
