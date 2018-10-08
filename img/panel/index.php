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
</head>
<body>
	<h1>Panel de Control</h1>
	<h2>Listado de galerias</h2>

	<div><a href="nueva_galeria.php">Cargar Nueva Galeria</a></div>
	<table border="1">
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
</body>
</html>