<?php
include('_setup.php');

$id_foto = $_GET['id_foto'];

$consulta=<<<SQL
DELETE FROM
	detalles
WHERE
	id_foto_auto = '$id_foto'
LIMIT 1
SQL;
mysqli_query($cnx, $consulta);

header("Location: administrar_fotos.php?id=1");

?>