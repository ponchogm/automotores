<?php
include('_setup.php');
$consulta =<<<SQL
SELECT
	id_galeria,
	titulo,
	DATE_FORMAT( fecha_alta, '%d/%m/%Y %H:%i' ) as fecha_alta,
	descripcion
FROM
	galerias
SQL;
$filas = mysqli_query($cnx, $consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Galerias</title>
	<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="js/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
</head>
<body>
	<div class="container">
	<h1>Panel de Control</h1>
	<h2>Listado de galerias</h2>

	<div><a href="nueva_galeria.php">Cargar Nueva Galeria</a></div>
	<table class="table table-bordered table-striped">
		<tr>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Fecha de Alta</th>
			<th>Botones de Acción</th>
		</tr>
		<?php
			while($columna = mysqli_fetch_assoc($filas)){
				echo "<tr>
					 <td>".$columna['titulo']."</td>
					 <td>".$columna['descripcion']."</td>
					 <td>".$columna['fecha_alta']."</td>
					 <td><a href='editar_galeria.php?id=$columna[id_galeria]'>editar</a> | <a href='borrar_galeria.php?id=$columna[id_galeria]'>borrar</a> | <a href='administrar_fotos.php?id=$columna[id_galeria]'>administrar fotos</a></td>
					 </tr>";

			}
		?>
	</table>
	<p><a href="../usados.php">Salir</a></p>
</div>	
</body>
</html>