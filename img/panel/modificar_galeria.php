<?php
include('_setup.php');
//var_dump($_POST); - Comprueba lo que llega por post
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$id = $_POST['id'];

$consulta=<<<SQL
UPDATE
	galerias
SET
	titulo='$titulo',
	descripcion='$descripcion'
WHERE
	id_galeria = '$id'
SQL;
mysqli_query($cnx, $consulta);

header("Location: index.php");
?>