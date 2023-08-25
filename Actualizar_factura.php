<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/Estilo2.css">
    <title>Actualizar factura</title>
</head>

<body>
    <?php
    include 'components/navbar/navbar.php';
    
    ?>
    <h1 class="titulo" href="">SHOP</h1>

    <div class="container mt-4">
        <h1 class="imagen">Actualizar factura</h1>

        <?php
        require_once "DAL/connection.php";

        if (isset($_GET['id'])) {
            $factura_id = $_GET['id'];

            // Establecer la conexión con el motor de base de datos Oracle
            $conn = Conecta();

            if (!$conn) {
                $e = oci_error();
                echo "Ocurrió un error al establecer la conexión: {$e['message']}";
            }

            // Obtener los detalles del registro de "factura" por su ID
            $query = "SELECT * FROM factura WHERE factura_id = :id";
            $statement = oci_parse($conn, $query);
            oci_bind_by_name($statement, ":id", $factura_id);
            oci_execute($statement);

            $factura = oci_fetch_assoc($statement);

            oci_free_statement($statement);
            oci_close($conn);
        } else {
            echo "ID de factura no especificado.";
        }
        ?>

        <form class="needs-validation" action="php2/actualizar_factura.php" method="POST" novalidate>
            <input type="hidden" name="factura_id" value="<?php echo $factura['FACTURA_ID']; ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $factura['NOMBRE']; ?>"
                    class="form-control" required>
                <div class="invalid-feedback">
                    Por favor, ingresa un nombre válido.
                </div>
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $factura['APELLIDOS']; ?>"
                    class="form-control" required>
                <div class="invalid-feedback">
                    Por favor, ingresa apellidos válidos.
                </div>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" id="correo" name="correo" value="<?php echo $factura['CORREO']; ?>"
                    class="form-control" required pattern=".+@.+\..+">
                <div class="invalid-feedback">
                    Por favor, ingresa un correo válido.
                </div>
            </div>
            <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad:</label>
                <input type="text" id="ciudad" name="ciudad" value="<?php echo $factura['CIUDAD']; ?>"
                    class="form-control" required>
                <div class="invalid-feedback">
                    Por favor, ingresa una ciudad válida.
                </div>
            </div>
            <div class="mb-3">
                <label for="tarjeta" class="form-label">Tarjeta:</label>
                <input type="text" id="tarjeta" name="tarjeta" value="<?php echo $factura['TARJETA']; ?>"
                    class="form-control" required pattern="\d{16}">
                <div class="invalid-feedback">
                    Por favor, ingresa una tarjeta válida con 16 dígitos.
                </div>
            </div>
            <div class="mb-3">
                <label for="codigo" class="form-label">Código:</label>
                <input type="text" id="codigo" name="codigo" value="<?php echo $factura['CODIGO']; ?>"
                    class="form-control" required pattern="\d{3,4}">
                <div class="invalid-feedback">
                    Por favor, ingresa un código válido de 3 a 4 dígitos.
                </div>
            </div>
            <div class="mb-3">
                <label for="total" class="form-label">Total:</label>
                <input type="text" id="total" name="total" value="<?php echo $factura['TOTAL']; ?>" class="form-control"
                    required>
                <div class="invalid-feedback">
                    Por favor, ingresa un valor válido para el total.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        (() => {
            'use strict';
        
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation');
        
            Array.prototype.slice.call(forms).forEach((form) => {
                form.addEventListener('submit', (event) => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                        
                        Array.from(form.elements).forEach((field) => {
                            if (!field.checkValidity()) {
                                field.classList.add('is-invalid');
                            }
                        });
                    } else {
                        Array.from(form.elements).forEach((field) => {
                            field.classList.remove('is-invalid');
                        });
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>

</html>
