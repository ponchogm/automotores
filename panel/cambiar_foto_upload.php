<?php
$id_foto = $_POST['id_foto'];
include('_setup.php');
$nombre_file = mktime() .'.jpg';
$posicion = 0;

$consulta = <<<SQL
SELECT
	id_foto,
	fkgaleria,
	archivo
FROM
	fotos
WHERE
	id_foto = '$id_foto'
SQL;

$filas = mysqli_query($cnx, $consulta);
$columna = mysqli_fetch_assoc($filas);
$filename = $columna['archivo'];
$fkgaleria = $columna['fkgaleria'];
//echo $filename;

if( file_exists('../fotos/'.$filename )){
	//echo "Existe el Archivo";
	unlink('../fotos/'.$filename);
}

$consulta = <<<SQL
UPDATE
	fotos
SET
	archivo='$nombre_file'
WHERE
	id_foto = '$id_foto'
SQL;

mysqli_query($cnx, $consulta);

$original = $_FILES['archivo']['tmp_name'];
$destino = "../fotos/$nombre_file";

move_uploaded_file($original, $destino);

header("Location: administrar_fotos.php?id=$fkgaleria")
?>