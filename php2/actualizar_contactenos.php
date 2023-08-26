<?php
// Establecer la conexión con el motor de base de datos Oracle

require_once "../DAL/connection.php";

$conn = Conecta();

if (!$conn) {
    $e = oci_error();
    echo "Ocurrió un error al establecer la conexión: {$e['message']}";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contactenos_id = $_POST['contactenos_id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $ciudad = $_POST['ciudad'];
    $mensaje = $_POST['mensaje'];

    // Preparar la consulta de actualización
    $query = "BEGIN ACTUALIZAR_CONTACTO(:contactenos_id, :nombre, :apellidos, :correo, :ciudad, :mensaje); END;";
    $statement = oci_parse($conn, $query);

    oci_bind_by_name($statement, ":nombre", $nombre);
    oci_bind_by_name($statement, ":apellidos", $apellidos);
    oci_bind_by_name($statement, ":correo", $correo);
    oci_bind_by_name($statement, ":ciudad", $ciudad);
    oci_bind_by_name($statement, ":mensaje", $mensaje);
    oci_bind_by_name($statement, ":contactenos_id", $contactenos_id);

    // Ejecutar la consulta de actualización
    if (oci_execute($statement)) {
        header("Location: ../consulta-datos.php");
        echo "Datos actualizados exitosamente.";
    } else {
        echo "Ocurrió un error al actualizar los datos.";
    }

    oci_free_statement($statement);
} else {
    echo "Método de solicitud no válido.";
}

oci_close($conn);
?>
