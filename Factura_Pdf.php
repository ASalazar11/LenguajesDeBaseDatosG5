<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />


    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>


    <script src="pdf.js"></script>



    <style>
    .form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding-left: 2em;
        padding-right: 2em;
        padding-bottom: 0.4em;
        background-color: #171717;
        border-radius: 25px;
        transition: .4s ease-in-out;
        width: 500px;
        /* Ancho del formulario */
        height: 500px;
        /* Alto del formulario */
        margin: 0 auto;
        /* Esto centrará horizontalmente el formulario */
        margin-top: 3.7em;
    }

    #heading {
        text-align: center;
        margin: 2em;
        color: rgb(255, 255, 255);
        font-size: 1.2em;
    }

    .field {
        display: flex;
        align-items: center;
        gap: 0.5em;
        border-radius: 25px;
        padding: 0.6em;
        border: none;
        outline: none;
        color: white;
        background-color: #171717;
        box-shadow: inset 2px 5px 10px rgb(5, 5, 5);
        justify-content: flex-start;
    }


    .form .btn {
        display: flex;
        justify-content: center;
        flex-direction: row;
        margin-top: 2.5em;
    }

    .button1 {
        padding: 0.5em;
        padding-left: 1.1em;
        padding-right: 1.1em;
        border-radius: 5px;
        margin-right: 0.5em;
        border: none;
        outline: none;
        align-items: center;
        text-decoration: none;
        transition: .4s ease-in-out;
        background-color: #252525;
        color: white;
    }

    .button1:hover {
        background-color: black;
        color: white;
    }

    .boton-icono {
        padding: 0.5em;
        padding-left: 1.1em;
        padding-right: 1.1em;
        border-radius: 5px;
        margin-right: 0.5em;
        border: none;
        outline: none;
        align-items: center;
        text-decoration: none;
        transition: .4s ease-in-out;
        background-color: #252525;
        color: white;
        width: 120px; /* Adjust the width as needed */
        height: 50px; /* Adjust the height as needed */
    }

    .boton-icono:hover {
        background-color: red;
        color: white;
    }

    .boton-icono {
        margin-left: 47%;
        margin-top: 2em;
    }


    h2 {
        margin: 0;
        font-size: 12px;
    }
    </style>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/Estilo2.css">


</head>


<body>
    <?php
    session_start();

?>

    <!-- <h1 class="titulo" href="">SHOP</h1> -->
    <?php
// Database connection
require_once "DAL/connection.php";

// Establecer la conexión con el motor de base de datos Oracle
$conn = Conecta();

if (!$conn) {
    $e = oci_error();
    echo "Ocurrió un error al establecer la conexión: {$e['message']}";
}

// Obtener la última factura agregada
$query = "SELECT * FROM factura WHERE ROWNUM = 1 ORDER BY factura_id DESC";
$statement = oci_parse($conn, $query);
oci_execute($statement);

$latestFactura = oci_fetch_assoc($statement);

oci_free_statement($statement);
oci_close($conn);
?>
    <h1 class="imagen">Factura</h1>

    <form class="form">
        <p id="heading">Confirmacion de Factura</p>
        <div class="field">
            <h2>Numero de Factura: </h2>
            <h2><?php echo $latestFactura['FACTURA_ID']; ?></h2>
        </div>
        <div class="field">
            <h2>Nombre</h2>
            <h2><?php echo $latestFactura['NOMBRE']; ?></h2>
        </div>
        <div class="field">
            <h2>Apellido</h2>
            <h2><?php echo $latestFactura['APELLIDOS']; ?></h2>
        </div>
        <div class="field">
            <h2>Correo</h2>
            <h2><?php echo $latestFactura['CORREO']; ?></h2>
        </div>
        <div class="divider"></div>
        <div class="divider"></div>
        <div class="divider"></div>
        <div class="field">
            <svg width="16" height="16">
            </svg>
            <h2>Total: </h2>
            <h2><?php echo $latestFactura['TOTAL']; ?></h2>
        </div>
        <div class="btn">
            <a class="button1" href="home.php">Volver al Inicio</a>
        </div>

    </form>


    <div class="divider"></div>
    <div class="divider"></div>
    <div class="divider"></div>
    <button id="capturar" class="boton-icono"><i class="fas fa-download"></i></button>
    <br>
    <br>
</body>

</html>