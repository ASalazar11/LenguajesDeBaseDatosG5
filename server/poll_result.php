<?php

$filename = "poll_result.txt";
$content = file($filename);


$array = explode("||", $content[0]);
$yes = intval($array[0]);
$no = intval($array[1]);

$resultado = array("Si" => $yes, "No" => $no);
echo json_encode($resultado);


// Los datos se envian en formato json
//osea son un objeto esto se puede ver los lo parentesis son cuadrados

?>