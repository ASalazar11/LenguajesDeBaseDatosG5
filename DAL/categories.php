<?php
require_once 'connection.php';

function getAllCategories()
{
    $response = false;
    $conn = Conecta();

    // Llamar al procedimiento almacenado
    $stmt = oci_parse($conn, 'BEGIN get_all_categories_proc(:p_result); END;');

    // Preparar el parámetro de salida
    $cursor = oci_new_cursor($conn);
    oci_bind_by_name($stmt, ':p_result', $cursor, -1, OCI_B_CURSOR);

    // Ejecutar el procedimiento
    oci_execute($stmt);
    oci_execute($cursor); // Ejecutar el cursor

    // Obtener el resultado del cursor
    $rows = array();
    while ($row = oci_fetch_array($cursor, OCI_ASSOC + OCI_NUM)) {
        $rows[] = $row;
    }

    // Verificar si se encontraron categorías
    if (!empty($rows)) {
        $response = $rows;
    }

    // Cerrar el cursor y la conexión
    oci_free_statement($stmt);
    oci_free_cursor($cursor);
    Desconecta($conn);

    return $response;
}


function getProductsByCategory( $category_id )
{
    $response = false;
    $conn = Conecta();

    // Preparar la llamada al procedimiento almacenado
    $sql = 'BEGIN GetProductsByCategoryProc(:category_id, :cursor); END;';
    $stmt = oci_parse( $conn, $sql );

    // Asociar los parámetros
    oci_bind_by_name( $stmt, ':category_id', $category_id );
    $cursor = oci_new_cursor($conn);
    oci_bind_by_name( $stmt, ':cursor', $cursor, -1, OCI_B_CURSOR);

    // Ejecutar el procedimiento
    oci_execute( $stmt );
    oci_execute( $cursor );

    // Obtener el resultado del cursor
    $rows = array();
    while ( $row = oci_fetch_array( $cursor, OCI_ASSOC + OCI_NUM ) ) {
        $rows[] = $row;
    }

    // Verificar si se encontraron productos
    if ( !empty( $rows ) ) {
        $response = $rows;
    }

    // Cerrar el cursor y desconectar
    oci_free_statement( $stmt );
    oci_free_statement( $cursor );
    Desconecta( $conn );

    return $response;
}