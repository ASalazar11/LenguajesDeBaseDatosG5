<?php

require_once 'connection.php';

function getAllCategories()
 {
    $response = false;
    $conn = Conecta();

    // Utilizar una consulta SQL para obtener todas las categorías directamente desde la vista
    $sql = 'SELECT * FROM categories_view';
    // Reemplaza 'categories_view' con el nombre real de tu vista
    $stmt = oci_parse( $conn, $sql );

    // Ejecutar la consulta preparada
    oci_execute( $stmt );

    // Obtener el resultado de la consulta
    $rows = array();
    while ( $row = oci_fetch_array( $stmt, OCI_ASSOC ) ) {
        $rows[] = $row;
    }

    // Verificar si se encontraron categorías
    if ( !empty( $rows ) ) {
        $response = $rows;
    }

    // Liberar la consulta y desconectar
    oci_free_statement( $stmt );
    Desconecta( $conn );

    return $response;
}

function getProductsByCategory( $category_id )
 {
    $response = false;
    $conn = Conecta();

    // Utilizar una consulta SQL para obtener productos por categoría directamente desde la vista
    $sql = 'SELECT * FROM products_by_category_view WHERE category_id = :category_id';
    // Reemplaza 'products_by_category_view' con el nombre real de tu vista
    $stmt = oci_parse( $conn, $sql );

    // Vincular el valor del parámetro de categoría
    oci_bind_by_name( $stmt, ':category_id', $category_id );

    // Ejecutar la consulta preparada
    oci_execute( $stmt );

    // Obtener el resultado de la consulta
    $rows = array();
    while ( $row = oci_fetch_array( $stmt, OCI_ASSOC ) ) {
        $rows[] = $row;
    }

    // Verificar si se encontraron productos
    if ( !empty( $rows ) ) {
        $response = $rows;
    }

    // Liberar la consulta y desconectar
    oci_free_statement( $stmt );
    Desconecta( $conn );

    return $response;
}

function EliminarContacto($idDato)
{
    $retorno = false;
    $conexion = conecta();  // Supongo que tienes una función llamada conecta() para establecer la conexión

    if ($conexion) {
        $query = "BEGIN EliminaContacto(:pIdDato); END;";
        $stmt = oci_parse($conexion, $query);

        oci_bind_by_name($stmt, ":pIdDato", $idDato);

        if (oci_execute($stmt)) {
            $retorno = true;
        }
        oci_free_statement($stmt);
        oci_close($conexion);
    }

    return $retorno;
}



function InsertaContacto($pNombre, $pApellidos, $pCorreo, $pCiudad, $pMensaje)
{
    $retorno = false;
    $conexion = conecta(); // Assuming you have a function named 'conecta' that establishes a database connection.

    if ($conexion) {
        $query = "BEGIN InsertaContacto(:pNombre, :pApellidos, :pCorreo, :pCiudad, :pMensaje); END;";
        $stmt = oci_parse($conexion, $query);

        oci_bind_by_name($stmt, ":pNombre", $pNombre);
        oci_bind_by_name($stmt, ":pApellidos", $pApellidos);
        oci_bind_by_name($stmt, ":pCorreo", $pCorreo);
        oci_bind_by_name($stmt, ":pCiudad", $pCiudad);
        oci_bind_by_name($stmt, ":pMensaje", $pMensaje);

        if (oci_execute($stmt)) {
            $retorno = true;
            oci_commit($conexion); // Commit the transaction if the execution was successful.
        } else {
            oci_rollback($conexion); // Rollback the transaction if there was an error.
        }

        oci_free_statement($stmt);
        oci_close($conexion);
    }

    return $retorno;
}


?>