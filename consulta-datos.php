<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whycux</title>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/Estilo2.css">
    <link rel="stylesheet" type="text/css" href="css/TablaContactenos.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />

</head>

<body style="background-color: #83c6ce">



<?php
include 'components/navbar/navbar.php';
require_once "DAL/connection.php";
?>

<h1 class="titulo">Datos de Contactenos</h1>

<?php
// Establish the Oracle database connection
$conn = Conecta();

if (!$conn) {
    $e = oci_error();
    echo "Ocurrió un error al establecer la conexión: {$e['message']}";
}

// Execute the query to retrieve data from the "contactenos" table
$query = "SELECT * FROM contactenos_vw";
$statement = oci_parse($conn, $query);
oci_execute($statement);

if ($e = oci_error($statement)) {
    echo "Ocurrió un error al ejecutar la consulta: {$e['message']}";
}

// Display the results of the query
ImprimirDatos($statement);

// Close the Oracle connection
oci_free_statement($statement);
oci_close($conn);

function ImprimirDatos($datos)
{
    echo '<div class="container">';
    echo '<table class="table align-middle mb-0 bg-white">';
    echo '<thead class="bg-light">';
    echo '<tr >';
    echo '<th>Nombre</th>';
    echo '<th>Apellidos</th>';
    echo '<th>Correo</th>';
    echo '<th>Ciudad</th>';
    echo '<th>Mensaje</th>';
    echo '<th></th>';
    echo '</tr>';
    echo '</thead>';

    if (!oci_fetch($datos)) {
        echo '<tr><td colspan="6">No hay datos</td></tr>';
    }

    while (($row = oci_fetch_assoc($datos)) !== false) {
        echo '<tr class="contenido">';
        echo '<td>' . $row['NOMBRE'] . '</td>';
        echo '<td>' . $row['APELLIDOS'] . '</td>';
        echo '<td>' . $row['CORREO'] . '</td>';
        echo '<td>' . $row['CIUDAD'] . '</td>';
        echo "<td style='max-width: 200px; word-wrap: break-word; word-break: break-all;'>{$row['MENSAJE']}</td>";
        echo '<td><a class="btn btn-success btn-rounded btn-sm fw-bold"
      data-mdb-ripple-color="black" href="Actualizar_contactenos.php?id=' . $row['CONTACTENOS_ID'] . '">Actualizar</a></td>';
    echo '<td><a class="btn btn-danger btn-rounded btn-sm fw-bold"
      data-mdb-ripple-color="black" href="php2/elimina-formulario.php?id=' . $row['CONTACTENOS_ID'] . '">Eliminar</a></td>';
    echo '</tr>';
    }

    echo '</table>';
    echo '</div>';
}
?>


<h1 class="titulo">Datos de Factura</h1>


<?php
// 1. Establecer la conexión con el motor de base de datos Oracle.
$conn = Conecta();

if (!$conn) {
    $e = oci_error();
    echo "Ocurrió un error al establecer la conexión: {$e['message']}";
}

// 2. Ejecutar la consulta para obtener los datos de la tabla factura.
$query = "SELECT * FROM factura_vw";
$statement = oci_parse($conn, $query);
oci_execute($statement);

if ($e = oci_error($statement)) {
    echo "Ocurrió un error al ejecutar la consulta: {$e['message']}";
}

// 3. Mostrar los resultados de la consulta.
ImprimirDatosFactura($statement);

// 4. Cerrar la conexión.
oci_free_statement($statement);
oci_close($conn);

function ImprimirDatosFactura($datos)
{
    echo '<div class="container">';
    echo '<table class="table align-middle mb-0 bg-white">';
    echo '<thead class="bg-light">';
    echo '<tr>';
    echo '<th>Nombre</th>';
    echo '<th>Apellidos</th>';
    echo '<th>Correo</th>';
    echo '<th>Ciudad</th>';
    echo '<th>Tarjeta</th>';
    echo '<th>Código</th>';
    echo '<th>Total</th>';
    echo '<th></th>';
    echo '</tr>';
    echo '</thead>';

    if (!oci_fetch($datos)) {
        echo '<tr><td colspan="8">No hay datos</td></tr>';
    }

    while (($row = oci_fetch_assoc($datos)) !== false) {
        echo '<tr class="contenido">';
        echo '<td>' . $row['NOMBRE'] . '</td>';
        echo '<td>' . $row['APELLIDOS'] . '</td>';
        echo '<td>' . $row['CORREO'] . '</td>';
        echo '<td>' . $row['CIUDAD'] . '</td>';
        echo '<td>' . $row['TARJETA'] . '</td>';
        echo '<td>' . $row['CODIGO'] . '</td>';
        echo '<td>' . $row['TOTAL'] . '</td>';
        echo '<td><a class="btn btn-success btn-rounded btn-sm fw-bold"
      data-mdb-ripple-color="black" href="Actualizar_factura.php?id=' . $row['FACTURA_ID'] . '">Actualizar</a></td>';
        echo '<td><a class="btn btn-danger btn-rounded btn-sm fw-bold"
            data-mdb-ripple-color="black" href="php2/elimina-formulario-factura.php?id=' . $row['FACTURA_ID'] . '">Eliminar</a></td>';
        echo '</tr>';
    }

    

    echo '</table>';
    echo '</div>';
}
?>



<h1 class="titulo">Datos de Usuarios</h1>

<?php
// 1. Establecer la conexión con el motor de base de datos Oracle.
$conn = Conecta();

if (!$conn) {
    $e = oci_error();
    echo "Ocurrió un error al establecer la conexión: {$e['message']}";
}

// 2. Ejecutar la consulta para obtener los datos de la tabla users.
$query = "SELECT * FROM users_vw";
$statement = oci_parse($conn, $query);
oci_execute($statement);

if ($e = oci_error($statement)) {
    echo "Ocurrió un error al ejecutar la consulta: {$e['message']}";
}

// 3. Mostrar los resultados de la consulta.
ImprimirDatosUsuarios($statement);

// 4. Cerrar la conexión.
oci_free_statement($statement);
oci_close($conn);

function ImprimirDatosUsuarios($datos)
{
    echo '<div class="container">';
    echo '<table class="table align-middle mb-0 bg-white">';
    echo '<thead class="bg-light">';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Nombre de Usuario</th>';
    echo '<th>Correo Electrónico</th>';
    echo '</tr>';
    echo '</thead>';

    if (!oci_fetch($datos)) {
        echo '<tr><td colspan="3">No hay datos</td></tr>';
    }

    while (($row = oci_fetch_assoc($datos)) !== false) {
        echo '<tr class="contenido">';
        echo '<td>' . $row['USER_ID'] . '</td>';
        echo '<td>' . $row['USERNAME'] . '</td>';
        echo '<td>' . $row['EMAIL'] . '</td>';
        echo '<td><a class="btn btn-success btn-rounded btn-sm fw-bold"
      data-mdb-ripple-color="black" href="Actualizar_usuarios.php?id=' . $row['USER_ID'] . '">Actualizar</a></td>';
        echo '<td><a class="btn btn-danger btn-rounded btn-sm fw-bold"
            data-mdb-ripple-color="black" href="php2/elimina-formulario-usuario.php?id=' . $row['USER_ID'] . '">Eliminar</a></td>';
        echo '</tr>';
    }

    echo '</table>';
    echo '</div>';
}
?>

<h1 class="titulo">Datos de Productos</h1>

<?php
// 1. Establecer la conexión con el motor de base de datos Oracle.
$conn = Conecta();

if (!$conn) {
    $e = oci_error();
    echo "Ocurrió un error al establecer la conexión: {$e['message']}";
}

// 2. Ejecutar la consulta para obtener los datos de la tabla products.
$query = "SELECT * FROM products_vw";
$statement = oci_parse($conn, $query);
oci_execute($statement);

if ($e = oci_error($statement)) {
    echo "Ocurrió un error al ejecutar la consulta: {$e['message']}";
}

// 3. Mostrar los resultados de la consulta.
ImprimirDatosProductos($statement);

// 4. Cerrar la conexión.
oci_free_statement($statement);
oci_close($conn);

function ImprimirDatosProductos($datos)
{
    echo '<div class="container">';
    echo '<table class="table align-middle mb-0 bg-white">';
    echo '<thead class="bg-light">';
    echo '<tr>';
    echo '<th>ID de Producto</th>';
    echo '<th>Nombre</th>';
    echo '<th>Descripción</th>';
    echo '<th>Precio</th>';
    echo '</tr>';
    echo '</thead>';

    if (!oci_fetch($datos)) {
        echo '<tr><td colspan="4">No hay datos</td></tr>';
    }

    while (($row = oci_fetch_assoc($datos)) !== false) {
        echo '<tr class="contenido">';
        echo '<td>' . $row['PRODUCT_ID'] . '</td>';
        echo '<td>' . $row['NAME'] . '</td>';
        echo '<td>' . $row['DESCRIPTION'] . '</td>';
        echo '<td>' . $row['PRICE'] . '</td>';
        echo '<td><a class="btn btn-success btn-rounded btn-sm fw-bold"
      data-mdb-ripple-color="black" href="Actualizar_productos.php?id=' . $row['PRODUCT_ID'] . '">Actualizar</a></td>';
        echo '<td><a class="btn btn-danger btn-rounded btn-sm fw-bold"
            data-mdb-ripple-color="black" href="php2/elimina-formulario-producto.php?id=' . $row['PRODUCT_ID'] . '">Eliminar</a></td>';
        echo '</tr>';
    }

    echo '</table>';
    echo '</div>';
}
?>




</body>

</html>