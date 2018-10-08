<?php

//var_dump($_POST); Verifico lo que llega como POST y Files
//var_dump($_FILES);

include('_setup.php');
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$kilometraje = $_POST['kilometraje'];
$fkgaleria = $_POST['idgaleria'];
$estado = 'Disponible';
$nombre_file = mktime() .'.jpg';
$posicion = 0;

$consulta = <<<SQL
INSERT INTO
	fotos
SET
	marca='$marca',
	modelo='$modelo',
	precio='$precio',
	kilometraje='$kilometraje',
	archivo='$nombre_file',
	estado='$estado',
	posicion='$posicion',
	fkgaleria='$fkgaleria'
SQL;

mysqli_query($cnx, $consulta);

$original = $_FILES['archivo']['tmp_name'];
$destino = "../fotos/$nombre_file";

move_uploaded_file($original, $destino);

header("Location: administrar_fotos.php?id=$fkgaleria")
?>