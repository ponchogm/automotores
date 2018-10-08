<?php
//var_dump($_POST);
include('_setup.php');
$id_foto = $_POST['id'];
$color = $_POST['color'];
$comb = $_POST['comb'];
$cil = $_POST['cil'];
$traccion = $_POST['traccion'];
$puertas = $_POST['puertas'];
$tapiz = $_POST['tapiz'];
$techo = $_POST['techo'];
$version = $_POST['version'];
$aire = $_POST['aire'];
$cierre = $_POST['cierre'];
$alzavidrios = $_POST['alzavidrios'];
$cd = $_POST['cd'];
$usb = $_POST['usb'];
$asiento = $_POST['asiento'];
$espejos = $_POST['espejos'];
$alarma = $_POST['alarma'];
$aircon = $_POST['aircon'];
$aircop = $_POST['aircop'];
$airlat = $_POST['airlat'];
$frenos = $_POST['frenos'];
$abs = $_POST['abs'];
$coment = $_POST['coment'];

$consulta = <<<SQL
UPDATE
	detalles
SET
	color='$color',
	combustible='$comb',
	cilindrada='$cil',
	traccion='$traccion',
	puertas='$puertas',
	tapiz='$tapiz',
	techo='$techo',
	version='$version',
	aire='$aire',
	cierre='$cierre',
	alzavidrios='$alzavidrios',
	cd='$cd',
	usb='$usb',
	asiento='$asiento',
	espejos='$espejos',
	alarma='$alarma',
	aircon='$aircon',
	aircop='$aircop',
	airlat='$airlat',
	frenos='$frenos',
	abs='$abs',
	comentarios='$coment'
WHERE
	id_foto_auto='$id_foto'
SQL;

mysqli_query($cnx, $consulta);

header("Location: administrar_fotos.php?id=1")
?>