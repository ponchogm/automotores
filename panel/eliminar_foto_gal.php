<?php
include('_setup.php');

$id_foto = $_GET['id'];
$filename = $_GET['archivo'];
$padre = $_GET['padre'];

//var_dump($_GET);  //Comprueba lo que llega por get

if( file_exists('../fotos2/'.$filename )){
	//echo "Existe el Archivo";
	unlink('../fotos2/'.$filename);
}

$consulta=<<<SQL
DELETE FROM
	fotos_hijas
WHERE
	id_foto_hija = '$id_foto'
LIMIT 1
SQL;
mysqli_query($cnx, $consulta);


header("Location: agregar_fotos.php?id_foto=$padre");

?>