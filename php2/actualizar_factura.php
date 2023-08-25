<?php
require_once "../DAL/connection.php"; // Asegúrate de ajustar la ruta al archivo de conexión si es necesario

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $factura_id = $_POST['factura_id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $ciudad = $_POST['ciudad'];
    $tarjeta = $_POST['tarjeta'];
    $codigo = $_POST['codigo'];
    $total = $_POST['total'];

    // Establecer la conexión con el motor de base de datos Oracle
    $conn = Conecta();

    if (!$conn) {
        $e = oci_error();
        echo "Ocurrió un error al establecer la conexión: {$e['message']}";
        exit;
    }

    // Preparar la consulta de actualización
    $query = "UPDATE factura SET nombre = :nombre, apellidos = :apellidos, correo = :correo, ciudad = :ciudad, tarjeta = :tarjeta, codigo = :codigo, total = :total WHERE factura_id = :factura_id";
    $statement = oci_parse($conn, $query);

    oci_bind_by_name($statement, ":nombre", $nombre);
    oci_bind_by_name($statement, ":apellidos", $apellidos);
    oci_bind_by_name($statement, ":correo", $correo);
    oci_bind_by_name($statement, ":ciudad", $ciudad);
    oci_bind_by_name($statement, ":tarjeta", $tarjeta);
    oci_bind_by_name($statement, ":codigo", $codigo);
    oci_bind_by_name($statement, ":total", $total);
    oci_bind_by_name($statement, ":factura_id", $factura_id);

    // Ejecutar la consulta de actualización
    if (oci_execute($statement)) {
        header("Location: ../consulta-datos.php");
        echo "Datos de factura actualizados exitosamente.";

    } else {
        echo "Ocurrió un error al actualizar los datos de factura.";
    }

    oci_free_statement($statement);
    oci_close($conn);
} else {
    echo "Método de solicitud no válido.";
}
?>
