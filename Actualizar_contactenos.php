<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Contacto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/Estilo2.css">
    <!-- Include any other necessary CSS here -->
</head>
<body>
<?php
    include 'components/navbar/navbar.php';
    
    ?>
<div class="titulo" href="">SHOP</div>

    <div class="container">
        <br>
        <br>
        <h1 class="imagen">Actualizar Contacto</h1>

        <form action="php2/actualizar_contactenos.php" method="POST" class="needs-validation" novalidate>
            <?php
            require_once "DAL/connection.php";

            if (isset($_GET['id'])) {
                $contactenos_id = $_GET['id'];

                $conn = Conecta();

                if (!$conn) {
                    $e = oci_error();
                    echo "Ocurrió un error al establecer la conexión: {$e['message']}";
                }

                $query = "SELECT * FROM contactenos WHERE contactenos_id = :id";
                $statement = oci_parse($conn, $query);
                oci_bind_by_name($statement, ":id", $contactenos_id);
                oci_execute($statement);

                $contacto = oci_fetch_assoc($statement);

                oci_free_statement($statement);
                oci_close($conn);
            } else {
                echo "ID de contacto no especificado.";
            }
            ?>
            <input type="hidden" name="contactenos_id" value="<?php echo $contacto['CONTACTENOS_ID']; ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $contacto['NOMBRE']; ?>" required>
                <div class="invalid-feedback">Por favor ingrese un nombre válido.</div>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $contacto['APELLIDOS']; ?>" required>
                <div class="invalid-feedback">Por favor ingrese apellidos válidos.</div>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $contacto['CORREO']; ?>" required>
                <div class="invalid-feedback">Por favor ingrese un correo válido con el símbolo "@".</div>
            </div>
            <div class="form-group">
                <label for="ciudad">Ciudad:</label>
                <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo $contacto['CIUDAD']; ?>" required>
                <div class="invalid-feedback">Por favor ingrese una ciudad válida.</div>
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea class="form-control" id="mensaje" name="mensaje" required><?php echo $contacto['MENSAJE']; ?></textarea>
                <div class="invalid-feedback">Por favor ingrese un mensaje válido.</div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>

    <!-- Include your necessary JavaScript libraries here -->

    <?php
    // Include the footer and any other common components here
    ?>

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
            }
            form.classList.add('was-validated');
          }, false);
        });
    })();
    </script>
</body>
</html>
