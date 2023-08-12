<?php
$vote = $_GET['vote'];

$filename = "poll_result.txt";
$content = file($filename);

$array = explode("||", $content[0]);
$yes = intval($array[0]);
$no = intval($array[1]);

if ($vote == 0) {
    $yes = $yes + 1;
}
if ($vote == 1) {
    $no = $no + 1;
}

$insertvote = $yes."||".$no;
$fp = fopen($filename, "w");
fputs($fp, $insertvote);
fclose($fp);

$resultado = array("Si" => $yes, "No" => $no);

echo json_encode($resultado);

//los datos se almacenan txt por medio ya sea si en un 1 o 0 el dato elgido en el radio
//esto porque se inserta en un arreglo para posterior mente ingresarlo al txt

?>