<?php

function Conecta()
{
    // importar la biblioteca OCI8
    if (!extension_loaded('oci8')) {
        die('La extensión OCI8 no está cargada. Verifica que esté instalada y habilitada en tu configuración de PHP.');
    }

    // cargar variables de entorno desde el archivo .env
    require_once __DIR__ . '/../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();

    // obtener valores de entorno para la conexión a Oracle
    $db_host = $_ENV['DB_HOST'];
    $db_port = $_ENV['DB_PORT'];
    $db_service_name = $_ENV['DB_SERVICE_NAME'];
    $db_user = $_ENV['DB_USER'];
    $db_pass = $_ENV['DB_PASS'];

    // construir la cadena de conexión con el nombre de servicio
    $conn_string = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=$db_host)(PORT=$db_port))(CONNECT_DATA=(SERVICE_NAME=$db_service_name)))";

    // establecer la conexión a Oracle
    $conn = oci_connect($db_user, $db_pass, $conn_string, 'AL32UTF8');

    if (!$conn) {
        $error = oci_error();
        echo "Error de conexión a Oracle: " . $error['message'];
        exit;
    }

    return $conn;
}

function Desconecta($conn)
{
    // cerrar la conexión a Oracle
    oci_close($conn);
}
?>
