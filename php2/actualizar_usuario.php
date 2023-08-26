<?php
require_once "../DAL/connection.php"; // Asegúrate de ajustar la ruta al archivo de conexión si es necesario

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Establecer la conexión con el motor de base de datos Oracle
    $conn = Conecta();

    if (!$conn) {
        $e = oci_error();
        echo "Ocurrió un error al establecer la conexión: {$e['message']}";
        exit;
    }

    // Preparar la consulta de actualización
    $query = "BEGIN actualizar_usuario(:user_id, :username, :password, :email); END;";
    $statement = oci_parse($conn, $query);

    oci_bind_by_name($statement, ":username", $username);
    oci_bind_by_name($statement, ":password", $password);
    oci_bind_by_name($statement, ":email", $email);
    oci_bind_by_name($statement, ":user_id", $user_id);

    // Ejecutar la consulta de actualización
    if (oci_execute($statement)) {
        header("Location: ../consulta-datos.php");
        echo "Datos de usuario actualizados exitosamente.";

    } else {
        echo "Ocurrió un error al actualizar los datos de usuario.";
    }

    oci_free_statement($statement);
    oci_close($conn);
} else {
    echo "Método de solicitud no válido.";
}
?>

