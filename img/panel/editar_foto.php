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
	<title>Editar Foto</title>
	<style type="text/css">
		label{ display: block;}
		textarea{ display: block;}
	</style>
</head>
<body>
	<form method="post" action="modificar_foto.php">
		<label>Marca</label>
			<input type="text" name="marca" value="<?php echo $columna['marca']; ?>"/>
			<label>Modelo</label>
			<input type="text" name="modelo" value="<?php echo $columna['modelo']; ?>"/>
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
</body>
</html>