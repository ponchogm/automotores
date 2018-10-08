<?php
include('_setup.php');
$id_foto=$_GET['id_foto'];

$consulta=<<<SQL
SELECT *
FROM fotos WHERE id_foto = '$id_foto'
LIMIT 1
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
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container">
	<h2>En este apartado puede agregar fotos adicionales a la principal (max. 10 fotos)</h2>
	<div class="car">
	<table border="1">
		<tr>
			<td colspan="10" span="10"><?php echo $columna['marca']." ".$columna['modelo']; ?></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="10" span="10"><img src="../fotos/<?php echo $columna['archivo']; ?>"/></td>
		</tr>
		<tr>
<?php
$consulta2=<<<SQL
SELECT *
FROM fotos_hijas WHERE id_foto_auto = '$id_foto'
SQL;

				$filas2 = mysqli_query($cnx, $consulta2);
				while($columna2 = mysqli_fetch_assoc($filas2)){
					$hija=$columna2['id_foto_hija'];
					echo "<td><img src='../fotos2/$columna2[archivo_hija]' width='60' height='60' /><p><a href='eliminar_foto_gal.php?id=$hija&archivo=$columna2[archivo_hija]&padre=$id_foto'>Eliminar</a></p></td>";
				}
?>
		</tr>
	</table>
	<p>
	<form method="post" enctype="multipart/form-data" action="agregar_foto_upload.php">
			<label>Archivo</label>
			<input type="file" name="imagenes[]" placeholder="Input field" multiple>

		<input type="hidden" name="id" value="<?php echo $id_foto; ?>">
		<input type="submit" />
	</form>
	<p>
		<a href="administrar_fotos.php?id=1">Volver a la administración de fotos</a>
		</div>
</div>		
</body>
</html>