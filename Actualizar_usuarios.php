<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/Estilo2.css">
</head>
<body>
<?php
    include 'components/navbar/navbar.php';
    
    ?>

    <h1 class="titulo" href="#">SHOP</h1>

<div class="container mt-4">
    <h1 class="imagen">Actualizar Usuarios</h1>

    <?php
    require_once "DAL/connection.php";

    if (isset($_GET['id'])) {
        $user_id = $_GET['id'];

        // Establecer la conexión con el motor de base de datos Oracle
        $conn = Conecta();

        if (!$conn) {
            $e = oci_error();
            echo "Ocurrió un error al establecer la conexión: {$e['message']}";
        }

        // Obtener los detalles del registro de "users" por su ID
        $query = "SELECT * FROM users WHERE user_id = :id";
        $statement = oci_parse($conn, $query);
        oci_bind_by_name($statement, ":id", $user_id);
        oci_execute($statement);

        $usuario = oci_fetch_assoc($statement);

        oci_free_statement($statement);
        oci_close($conn);
    } else {
        echo "ID de usuario no especificado.";
    }
    ?>

    <form action="php2/actualizar_usuario.php" method="POST" class="needs-validation" novalidate>
        <input type="hidden" name="user_id" value="<?php echo $usuario['USER_ID']; ?>">
        <div class="mb-3">
            <label for="username" class="form-label">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" value="<?php echo $usuario['USERNAME']; ?>"
                   class="form-control" required>
            <div class="invalid-feedback">
                Por favor, ingresa un nombre de usuario válido.
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" id="password" name="password" value="<?php echo $usuario['PASSWORD']; ?>"
                   class="form-control" required>
            <div class="invalid-feedback">
                Por favor, ingresa una contraseña válida.
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico:</label>
            <input type="email" id="email" name="email" value="<?php echo $usuario['EMAIL']; ?>"
                   class="form-control" required pattern=".+@.+\..+">
            <div class="invalid-feedback">
                Por favor, ingresa un correo electrónico válido.
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
