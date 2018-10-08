<?php
include('_setup.php');
$id_foto=$_GET['id_foto'];
$consulta = <<<SQL
SELECT *

FROM
	detalles
WHERE
	id_foto_auto = '$id_foto'
SQL;
$filas = mysqli_query($cnx, $consulta);
$columna = mysqli_fetch_assoc($filas);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="js/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
	<title>Agregar Fotos a la Principal</title>
	<style type="text/css">
		label{ display: block;}
		textarea{ display: block;}
		.car {
			display: inline-block;
			border: 1px solid #333;
			margin: 4px;
			padding: 5px;
			background-color: #F7F7F3;
			text-align: left;
		}
	</style>
</head>
<body>
	<div class="container">
	<h2>En este apartado puede Editar caráterísticas de cada vehículo y comentarios</h2>
	<p>
    <div class="car">
	<form method="post" action="edita_ficha.php">
			<label>Color</label>
			<input type="text" name="color" value="<?php echo $columna['color']; ?>"/>
			<label>Combustible</label>
			<select name="comb">
				<option value="Gasolina" <?php if($columna['combustible'] == 'Gasolina'){echo 'selected';}?>>Gasolina</option>
				<option value="Diesel" <?php if($columna['combustible'] == 'Diesel'){echo 'selected';}?>>Diesel</option>
				<option value="Otro" <?php if($columna['combustible'] == 'Otro'){echo 'selected';}?>>Otro</option>
			</select>
			<label>Cilindrada</label>
			<input type="text" name="cil" value="<?php echo $columna['cilindrada']; ?>"/>
			<label>Tracción</label>
			<input type="text" name="traccion" value="<?php echo $columna['traccion']; ?>" />
			<label>Puertas</label>
			<select  name="puertas">
				<option value="5" <?php if($columna['puertas'] == '5'){echo 'selected';}?>>5</option>
				<option value="3" <?php if($columna['puertas'] == '3'){echo 'selected';}?>>3</option>
			</select>
			<label>Tapíz</label>
			<select  name="tapiz">
				<option value="Tela" <?php if($columna['tapiz'] == 'Tela'){echo 'selected';}?>>Tela</option>
				<option value="Cuero Sintetico" <?php if($columna['tapiz'] == 'Cuero Sintetico'){echo 'selected';}?>>Cuero Sintetico</option>
				<option value="Cuero Natural" <?php if($columna['tapiz'] == 'Cuero Natural'){echo 'selected';}?>>Cuero Natural</option>
			</select>
			<label>Techo</label>
			<select  name="techo">
				<option value="Normal" <?php if($columna['techo'] == 'Normal'){echo 'selected';}?>>Normal</option>
				<option value="Sun Roof" <?php if($columna['techo'] == 'Sun Roof'){echo 'selected';}?>>Sun Roof</option>
				<option value="Descapotable" <?php if($columna['techo'] == 'Descapotable'){echo 'selected';}?>>Descapotable</option>
			</select>
			<label>Version</label>
			<input type="text" name="version" value="<?php echo $columna['version']; ?>" />
			<label>Aire Acondicionado</label>
			<select  name="aire">
				<option value="Si" <?php if($columna['aire'] == 'Si'){echo 'selected';}?>>Si</option>
				<option value="No" <?php if($columna['aire'] == 'No'){echo 'selected';}?>>No</option>
			</select>
			<label>Cierre centralizado</label>
			<select  name="cierre">
				<option value="Si" <?php if($columna['cierre'] == 'Si'){echo 'selected';}?>>Si</option>>Si</option>
				<option value="No" <?php if($columna['cierre'] == 'No'){echo 'selected';}?>>No</option>
			</select>
			<label>Alzavidrios eléctricos</label>
			<select  name="alzavidrios">
				<option value="Si" <?php if($columna['alzavidrios'] == 'Si'){echo 'selected';}?>>Si</option>
				<option value="No" <?php if($columna['alzavidrios'] == 'No'){echo 'selected';}?>>No</option>
			</select>
			<label>Radio con CD - CDMP3</label>
			<select  name="cd">
				<option value="Si" <?php if($columna['cd'] == 'Si'){echo 'selected';}?>>Si</option>
				<option value="No" <?php if($columna['cd'] == 'No'){echo 'selected';}?>>No</option>
			</select>
			<label>Radio USB/MP3</label>
			<select  name="usb">
				<option value="Si" <?php if($columna['usb'] == 'Si'){echo 'selected';}?>>Si</option>
				<option value="No" <?php if($columna['usb'] == 'No'){echo 'selected';}?>>No</option>
			</select>
			<label>Asiento trasero abatible</label>
			<select  name="asiento">
				<option value="Si" <?php if($columna['asiento'] == 'Si'){echo 'selected';}?>>Si</option>
				<option value="No" <?php if($columna['asiento'] == 'No'){echo 'selected';}?>>No</option>
			</select>
			<label>Espejos exteriores regulables desde el interior</label>
			<select  name="espejos">
				<option value="Si" <?php if($columna['espejos'] == 'Si'){echo 'selected';}?>>Si</option>
				<option value="No" <?php if($columna['espejos'] == 'No'){echo 'selected';}?>>No</option>
			</select>
			<label>Alarma</label>
			<select  name="alarma">
				<option value="Si" <?php if($columna['alarma'] == 'Si'){echo 'selected';}?>>Si</option>
				<option value="No" <?php if($columna['alarma'] == 'No'){echo 'selected';}?>>No</option>
			</select>
			<label>Airbag conductor</label>
			<select  name="aircon">
				<option value="Si" <?php if($columna['aircon'] == 'Si'){echo 'selected';}?>>Si</option>
				<option value="No" <?php if($columna['aircon'] == 'No'){echo 'selected';}?>>No</option>
			</select>
			<label>Airbag acompañante</label>
			<select  name="aircop">
				<option value="Si" <?php if($columna['aircop'] == 'Si'){echo 'selected';}?>>Si</option>
				<option value="No" <?php if($columna['aircop'] == 'No'){echo 'selected';}?>>No</option>
			</select>
			<label>Airbag laterales delanteros</label>
			<select  name="airlat">
				<option value="Si" <?php if($columna['airlat'] == 'Si'){echo 'selected';}?>>Si</option>
				<option value="No" <?php if($columna['airlat'] == 'No'){echo 'selected';}?>>No</option>
			</select>
			<label>Frenos de discos traseros</label>
			<select  name="frenos">
				<option value="Si" <?php if($columna['frenos'] == 'Si'){echo 'selected';}?>>Si</option>
				<option value="No" <?php if($columna['frenos'] == 'No'){echo 'selected';}?>>No</option>
			</select>
			<label>Sistema frenos ABS</label>
			<select  name="abs">
				<option value="Si" <?php if($columna['abs'] == 'Si'){echo 'selected';}?>>Si</option>
				<option value="No" <?php if($columna['abs'] == 'No'){echo 'selected';}?>>No</option>
			</select>
			<label>Comentarios</label>
			<textarea rows="4" cols="50" name="coment"><?php echo $columna['comentarios']; ?></textarea>
		<input type="hidden" name="id" value="<?php echo $id_foto; ?>">
		<p>
		<input type="submit" />
	</form>
	</p>
    </div>
		<a href="administrar_fotos.php?id=1">Volver a la administración de fotos</a>
	</div>
</body>
</html>