<?php
include('_setup.php');
$id=$_GET['id'];

$consulta=<<<SQL
SELECT titulo, descripcion
FROM galerias WHERE id_galeria = '$id'
LIMIT 1
SQL;

$filas = mysqli_query($cnx, $consulta);
$columna = mysqli_fetch_assoc($filas);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar Galeria</title>
	<style type="text/css">
		label{ display: block;}
		textarea{ display: block;}
	</style>
</head>
<body>
	<form method="post" action="modificar_galeria.php">
		<label>Titulo</label>
		<input type="text" name="titulo" value="<?php echo $columna['titulo']; ?>"/>
		<label>Descripción</label>
		<textarea name="descripcion" rows="5" cols="90"><?php echo $columna['descripcion']; ?></textarea>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="submit" />
	</form>
</body>
</html>