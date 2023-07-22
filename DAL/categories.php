<?php
require_once 'connection.php';

function getAllCategories()
 {
    $response = false;
    $conn = Conecta();

    // Utilizar una consulta SQL para obtener todas las categorías
    $sql = 'SELECT * FROM categories';
    $stmt = oci_parse( $conn, $sql );

    // Ejecutar la consulta preparada
    oci_execute( $stmt );

    // Obtener el resultado de la consulta
    $rows = array();
    while ( $row = oci_fetch_array( $stmt, OCI_ASSOC + OCI_NUM ) ) {
        $rows[] = $row;
    }

    // Verificar si se encontraron categorías
    if ( !empty( $rows ) ) {
        $response = $rows;
    }

    // Cerrar la consulta preparada y desconectar
    oci_free_statement( $stmt );
    Desconecta( $conn );

    return $response;
}

function getProductsByCategory( $category_id )
 {
    $response = false;
    $conn = Conecta();

    // Utilizar una consulta SQL para obtener los productos por categoría
    $sql = 'SELECT * FROM products WHERE category_id = :category_id';
    $stmt = oci_parse( $conn, $sql );

    // Asociar el valor del parámetro de la categoría
    oci_bind_by_name( $stmt, ':category_id', $category_id );

    // Ejecutar la consulta preparada
    oci_execute( $stmt );

    // Obtener el resultado de la consulta
    $rows = array();
    while ( $row = oci_fetch_array( $stmt, OCI_ASSOC + OCI_NUM ) ) {
        $rows[] = $row;
    }

    // Verificar si se encontraron productos
    if ( !empty( $rows ) ) {
        $response = $rows;
    }

    // Cerrar la consulta preparada y desconectar
    oci_free_statement( $stmt );
    Desconecta( $conn );

    return $response;
}