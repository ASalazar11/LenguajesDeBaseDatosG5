<?php
require_once "../DAL/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $image2 = $_POST['image2'];

    $image = $_FILES['image'];  // Obtener información del archivo subido

    // Ruta de destino para la imagen (directorio "assets")
    $imagePath = "../assets/" . basename($image['name']);

    if (move_uploaded_file($image['tmp_name'], $imagePath)) {
        // La función move_uploaded_file devuelve true si la operación tiene éxito

        // Establecer la conexión con la base de datos
        $conn = Conecta();

        if (!$conn) {
            $e = oci_error();
            echo "Ocurrió un error al establecer la conexión: {$e['message']}";
            exit;
        }

        $imagePathWithoutColon = substr($imagePath, 3);


        // Preparar la consulta de actualización
        $query = "UPDATE products SET name = :name, description = :description, price = :price, category_id = :category_id, image = :image WHERE product_id = :product_id";
        $statement = oci_parse($conn, $query);

        oci_bind_by_name($statement, ":name", $name);
        oci_bind_by_name($statement, ":description", $description);
        oci_bind_by_name($statement, ":price", $price);
        oci_bind_by_name($statement, ":category_id", $category_id);
        oci_bind_by_name($statement, ":image", $imagePathWithoutColon);  // Guardar la ruta de la imagen
        oci_bind_by_name($statement, ":product_id", $product_id);

        // Ejecutar la consulta
        oci_execute($statement);

        // Cerrar la consulta y la conexión
        oci_free_statement($statement);
        oci_close($conn);

        echo "Producto actualizado exitosamente.";
        header("Location: ../consulta-datos.php");
    } else {
        // Establecer la conexión con la base de datos
        $conn = Conecta();

        if (!$conn) {
            $e = oci_error();
            echo "Ocurrió un error al establecer la conexión: {$e['message']}";
            exit;
        }

        $imagePathWithoutColon = substr($imagePath, 3);


        // Preparar la consulta de actualización
        $query = "UPDATE products SET name = :name, description = :description, price = :price, category_id = :category_id, image = :image WHERE product_id = :product_id";
        $statement = oci_parse($conn, $query);

        oci_bind_by_name($statement, ":name", $name);
        oci_bind_by_name($statement, ":description", $description);
        oci_bind_by_name($statement, ":price", $price);
        oci_bind_by_name($statement, ":category_id", $category_id);
        oci_bind_by_name($statement, ":image", $image2);  // Guardar la ruta de la imagen
        oci_bind_by_name($statement, ":product_id", $product_id);

        // Ejecutar la consulta
        oci_execute($statement);

        // Cerrar la consulta y la conexión
        oci_free_statement($statement);
        oci_close($conn);

        echo "Producto actualizado exitosamente.";
        header("Location: ../consulta-datos.php");
    }
}
?>
