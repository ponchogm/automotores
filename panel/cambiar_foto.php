<?php
$id_foto = $_GET['id_foto'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="js/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
	<title>Administración de Fotos</title>
	<style type="text/css">
		label {display: block;}
		.car {
			display: inline-block;
			border: 1px solid #333;
			margin: 4px;
			padding: 5px;
			background-color: #F7F7F3;
		}
	</style>
</head>
<body>
	<div class="container">
	<h1>Panel de Control</h1>
	<h2>Aquí puedes Cambiar la Foto Principal de la Galería</h2>
<form method="post" enctype="multipart/form-data" action="cambiar_foto_upload.php">
	<input type="hidden" name="id_foto" value="<?php echo $id_foto; ?>" />
		<div>
			<label>Archivo</label>
			<input type="file" name="archivo" />
		</div>
		<input type="submit" value="Cambiar foto" />

	</form>
	<p>
		<a href="administrar_fotos.php?id=1">Volver a la administración de fotos</a>
	</p>
</body>
</div>
</html>