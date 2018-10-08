<?php
include('_setup.php');
$id_foto=$_GET['id_foto'];
$consulta = <<<SQL
SELECT *

FROM
	fotos
WHERE
	id_foto = '$id_foto'
SQL;
$filas = mysqli_query($cnx, $consulta);
$columna = mysqli_fetch_assoc($filas);

//Consulto si tiene ya una ficha
$consulta2 = <<<SQL
SELECT *

FROM
	detalles
WHERE
	id_foto_auto = '$id_foto'
SQL;
$filas2 = mysqli_query($cnx, $consulta2);
$columna2 = mysqli_fetch_assoc($filas2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Fotos a la Principal</title>
	<style type="text/css">
		label{ display: block;}
		textarea{ display: block;}
	</style>
    <style type="text/css">
		div.centraTabla{text-align: center;}
		div.centraTabla table {margin: 0 auto; text-align: left;}
		label {display: block;}
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
	<?php if($columna2['id_foto_auto']!=$id_foto): ?>
<h2>En este apartado puede agregar caráterísticas de cada vehículo y comentarios</h2>
	<p>
		Ficha: <?php echo $columna['marca']; ?> - Modelo: <?php echo $columna['modelo']; ?>
	<p>
    <div class="car">
	<form method="post" action="agregar_ficha.php">
			<label>Color</label>
			<input type="text" name="color" />
			<label>Combustible</label>
			<select name="comb">
				<option value="Gasolina">Gasolina</option>
				<option value="Diesel">Diesel</option>
				<option value="Otro">Otro</option>
			</select>
			<label>Cilindrada</label>
			<input type="text" name="cil" />
			<label>Tracción</label>
			<input type="text" name="traccion" />
			<label>Puertas</label>
			<select  name="puertas">
				<option value="5">5</option>
				<option value="3">3</option>
			</select>
			<label>Tapíz</label>
			<select  name="tapiz">
				<option value="Tela">Tela</option>
				<option value="Cuero Sintetico">Cuero Sintetico</option>
				<option value="Cuero Natural">Cuero Natural</option>
			</select>
			<label>Techo</label>
			<select  name="techo">
				<option value="Normal">Normal</option>
				<option value="Sun Roof">Sun Roof</option>
				<option value="Descapotable">Descapotable</option>
			</select>
			<label>Version</label>
			<input type="text" name="version" />
			<label>Aire Acondicionado</label>
			<select  name="aire">
				<option value="Si">Si</option>
				<option value="No">No</option>
			</select>
			<label>Cierre centralizado</label>
			<select  name="cierre">
				<option value="Si">Si</option>
				<option value="No">No</option>
			</select>
			<label>Alzavidrios eléctricos</label>
			<select  name="alzavidrios">
				<option value="Si">Si</option>
				<option value="No">No</option>
			</select>
			<label>Radio con CD - CDMP3</label>
			<select  name="cd">
				<option value="Si">Si</option>
				<option value="No">No</option>
			</select>
			<label>Radio USB/MP3</label>
			<select  name="usb">
				<option value="Si">Si</option>
				<option value="No">No</option>
			</select>
			<label>Asiento trasero abatible</label>
			<select  name="asiento">
				<option value="Si">Si</option>
				<option value="No">No</option>
			</select>
			<label>Espejos exteriores regulables desde el interior</label>
			<select  name="espejos">
				<option value="Si">Si</option>
				<option value="No">No</option>
			</select>
			<label>Alarma</label>
			<select  name="alarma">
				<option value="Si">Si</option>
				<option value="No">No</option>
			</select>
			<label>Airbag conductor</label>
			<select  name="aircon">
				<option value="Si">Si</option>
				<option value="No">No</option>
			</select>
			<label>Airbag acompañante</label>
			<select  name="aircop">
				<option value="Si">Si</option>
				<option value="No">No</option>
			</select>
			<label>Airbag laterales delanteros</label>
			<select  name="airlat">
				<option value="Si">Si</option>
				<option value="No">No</option>
			</select>
			<label>Frenos de discos traseros</label>
			<select  name="frenos">
				<option value="Si">Si</option>
				<option value="No">No</option>
			</select>
			<label>Sistema frenos ABS</label>
			<select  name="abs">
				<option value="Si">Si</option>
				<option value="No">No</option>
			</select>
			<label>Comentarios</label>
			<textarea rows="4" cols="50" name="coment">Escriba aquí sus comentarios</textarea>
		<input type="hidden" name="id" value="<?php echo $id_foto; ?>">
		<p>
		<input type="submit" />
	</form>
	<p>
    </div>
		<a href="administrar_fotos.php?id=1">Volver a la administración de fotos</a>
    <?php endif; ?>
    <?php if($columna2['id_foto_auto']==$id_foto): ?>
    <h2>Ficha ingresada para el vehículo: <?php echo $columna['marca']; ?> - Modelo: <?php echo $columna['modelo']; ?></h2>
    <div class="car">
    <table width="900" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="205">Color</td>
        <td width="78"><?php echo $columna2['color']; ?></td>
        <td width="21">&nbsp;</td>
        <td width="315">Radio con CD - CDMP3</td>
        <td width="281"><?php echo $columna2['cd']; ?></td>
      </tr>
      <tr>
        <td>Combustible</td>
        <td><?php echo $columna2['combustible']; ?></td>
        <td>&nbsp;</td>
        <td>Radio USB/MP3</td>
        <td><?php echo $columna2['usb']; ?></td>
      </tr>
      <tr>
        <td>Cilindrada</td>
        <td><?php echo $columna2['cilindrada']; ?></td>
        <td>&nbsp;</td>
        <td>Asiento trasero abatible</td>
        <td><?php echo $columna2['asiento']; ?></td>
      </tr>
      <tr>
        <td>Tracción</td>
        <td><?php echo $columna2['traccion']; ?></td>
        <td>&nbsp;</td>
        <td>Espejos exteriores regulables desde el interior</td>
        <td><?php echo $columna2['espejos']; ?></td>
      </tr>
      <tr>
        <td>Puertas</td>
        <td><?php echo $columna2['puertas']; ?></td>
        <td>&nbsp;</td>
        <td>Alarma</td>
        <td><?php echo $columna2['alarma']; ?></td>
      </tr>
      <tr>
        <td>Tapíz</td>
        <td><?php echo $columna2['tapiz']; ?></td>
        <td>&nbsp;</td>
        <td>Airbag conductor</td>
        <td><?php echo $columna2['aircon']; ?></td>
      </tr>
      <tr>
        <td>Techo</td>
        <td><?php echo $columna2['techo']; ?></td>
        <td>&nbsp;</td>
        <td>Airbag acompañante</td>
        <td><?php echo $columna2['aircop']; ?></td>
      </tr>
      <tr>
        <td>Versión</td>
        <td><?php echo $columna2['version']; ?></td>
        <td>&nbsp;</td>
        <td>Airbag laterales delanteros</td>
        <td><?php echo $columna2['airlat']; ?></td>
      </tr>
      <tr>
        <td>Aire Acondicionado</td>
        <td><?php echo $columna2['aire']; ?></td>
        <td>&nbsp;</td>
        <td>Frenos de discos traseros</td>
        <td><?php echo $columna2['frenos']; ?></td>
      </tr>
      <tr>
        <td>Cierre centralizado</td>
        <td><?php echo $columna2['cierre']; ?></td>
        <td>&nbsp;</td>
        <td>Sistema frenos ABS</td>
        <td><?php echo $columna2['abs']; ?></td>
      </tr>
      <tr>
        <td>Alzavidrios eléctricos</td>
        <td><?php echo $columna2['alzavidrios']; ?></td>
        <td>&nbsp;</td>
        <td>Comentarios</td>
        <td><?php echo $columna2['comentarios']; ?></td>
      </tr>
    </table>
    <p><a href="administrar_fotos.php?id=1">Volver</a></p>
	</div>        
    <?php endif; ?>   
</body>
</html>