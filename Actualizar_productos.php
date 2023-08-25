<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/Estilo2.css">
</head>

<body>
    <?php
    include 'components/navbar/navbar.php';
    
    ?>
    <h1 class="titulo" href="">SHOP</h1>

    <div class="container mt-4">
        <h1 class="imagen">Actualizar Producto</h1>

        <?php
    require_once "DAL/connection.php";

    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];

        // Establecer la conexión con el motor de base de datos Oracle
        $conn = Conecta();

        if (!$conn) {
            $e = oci_error();
            echo "Ocurrió un error al establecer la conexión: {$e['message']}";
        }

        // Obtener los detalles del registro de "products" por su ID
        $query = "SELECT * FROM products WHERE product_id = :id";
        $statement = oci_parse($conn, $query);
        oci_bind_by_name($statement, ":id", $product_id);
        oci_execute($statement);

        $producto = oci_fetch_assoc($statement);

        oci_free_statement($statement);
        oci_close($conn);
    } else {
        echo "ID de producto no especificado.";
    }
    ?>

        <form action="php2/actualizar_producto.php" method="POST" enctype="multipart/form-data" class="needs-validation"
            novalidate>
            <input type="hidden" name="product_id" value="<?php echo $producto['PRODUCT_ID']; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Producto:</label>
                <input type="text" id="name" name="name" value="<?php echo $producto['NAME']; ?>" class="form-control"
                    required>
                <div class="invalid-feedback">
                    Por favor, ingresa un nombre válido.
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción:</label>
                <input type="text" id="description" name="description" value="<?php echo $producto['DESCRIPTION']; ?>"
                    class="form-control" required>
                <div class="invalid-feedback">
                    Por favor, ingresa una descripción válida.
                </div>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio:</label>
                <input type="text" id="price" name="price" value="<?php echo $producto['PRICE']; ?>"
                    class="form-control" required>
                <div class="invalid-feedback">
                    Por favor, ingresa un precio válido.
                </div>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría:</label>
                <select id="category_id" name="category_id" class="form-control" required>
                    <option value="1" <?php if ($producto['CATEGORY_ID'] == 1) echo "selected"; ?>>Hombre</option>
                    <option value="2" <?php if ($producto['CATEGORY_ID'] == 2) echo "selected"; ?>>Mujer</option>
                    <option value="3" <?php if ($producto['CATEGORY_ID'] == 3) echo "selected"; ?>>Niño</option>
                </select>
                <div class="invalid-feedback">
                    Por favor, selecciona una categoría válida.
                </div>
            </div>
            <div class="mb-3">
                <input type="hidden" id="image2" name="image2" value="<?php echo $producto['IMAGE']; ?>"
                    class="form-control" >
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagen:</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
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