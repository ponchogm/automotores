<?php
include('_setup.php');
//var_dump($_POST); - Comprueba lo que llega por post
$id_foto = $_POST['id'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$anio = $_POST['anio'];
$kilometraje = $_POST['kilometraje'];
$precio = $_POST['precio'];
$estado = $_POST['estado'];

$consulta=<<<SQL
UPDATE
	fotos
SET
	marca='$marca',
	modelo='$modelo',
	anio='$anio',
	precio='$precio',
	kilometraje='$kilometraje',
	estado='$estado'

WHERE
	id_foto = '$id_foto'
SQL;
mysqli_query($cnx, $consulta);

header("Location: administrar_fotos.php?id=1");
?>