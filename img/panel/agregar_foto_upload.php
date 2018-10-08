<?php

include('_setup.php');
$id_foto=$_POST['id'];
$nombre_file = mktime() .'.jpg';


$consulta = <<<SQL
INSERT INTO
	fotos_hijas
SET
	id_foto_auto='$id_foto',
	archivo_hija='$nombre_file'
SQL;

mysqli_query($cnx, $consulta);

$original = $_FILES['archivo']['tmp_name'];
$destino = "../fotos2/$nombre_file";

move_uploaded_file($original, $destino);

header("Location: agregar_fotos.php?id_foto=$id_foto")
?>