<?php
include('_setup.php');
//var_dump($_POST); - Comprueba lo que llega por post
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];

$consulta=<<<SQL
INSERT INTO
	galerias
SET
	titulo='$titulo',
	descripcion='$descripcion',
	fecha_alta= NOW()
SQL;
mysqli_query($cnx, $consulta);

header("Location: index.php");
?>