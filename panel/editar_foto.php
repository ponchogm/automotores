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
	<title>Editar Foto</title>
	<style type="text/css">
		label{ display: block;}
		textarea{ display: block;}
	</style>
</head>
<body>
<div class="container">
<h2>En este apartado puedes Editar Los Datos Principales del Vehículo</h2>	
<p>
	<form method="post" action="modificar_foto.php">
		<label>Marca</label>
			<input type="text" name="marca" value="<?php echo $columna['marca']; ?>"/>
			<label>Modelo</label>
			<input type="text" name="modelo" value="<?php echo $columna['modelo']; ?>"/>
			<label>Año</label>
			<input type="text" name="anio" value="<?php echo $columna['anio']; ?>"/>
			<label>Kilometraje</label>
			<input type="text" name="kilometraje" value="<?php echo $columna['kilometraje']; ?>"/>
			<label>Precio</label>
			<input type="text" name="precio" value="<?php echo $columna['precio']; ?>"/>
			<label>Estado</label>
			<select name="estado">
				<option value="Disponible">Disponible</option>
				<option value="Vendido">Vendido</option>
			</select>
			<label>Foto</label>
			<img src="../fotos/<?php echo $columna['archivo']; ?>"/>
		<input type="hidden" name="id" value="<?php echo $id_foto; ?>">
		<input type="submit" />
	</form>
	<p>
		<a href="administrar_fotos.php?id=1">Volver a la administración de fotos</a>
	</p>
</div>	
</body>
</html>