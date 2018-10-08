<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nueva galeria</title>
	<style type="text/css">
		label{ display: block;}
		textarea{ display: block;}
	</style>
</head>
<body>
	<form method="post" action="guardar_galeria.php">
		<label>Titulo</label>
		<input type="text" name="titulo" />
		<label>Descripción</label>
		<textarea name="descripcion" rows="5" cols="90"></textarea>
		<input type="submit" />
	</form>
</body>
</html>