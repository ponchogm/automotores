<?php
include('_setup.php');

$id_foto = $_GET['id_foto'];
$filename = $_GET['file_name'];

//var_dump($_GET);  //Comprueba lo que llega por get

if( file_exists('../fotos/'.$filename )){
	//echo "Existe el Archivo";
	unlink('../fotos/'.$filename);
}

$consulta=<<<SQL
DELETE FROM
	fotos
WHERE
	id_foto = '$id_foto'
LIMIT 1
SQL;
mysqli_query($cnx, $consulta);


$consulta2=<<<SQL
DELETE FROM
	fotos_hijas
WHERE
	id_foto_auto = '$id_foto'
SQL;
mysqli_query($cnx, $consulta2);

header("Location: administrar_fotos.php?id=1");

?>