<?php
$id = $_GET['id'];
include('_setup.php');
$consulta = <<<SQL
SELECT
	id_foto,
	marca,
	modelo,
	anio,
	precio,
	kilometraje,
	archivo,
	estado
FROM
	fotos
WHERE
	fkgaleria = '$id'
ORDER BY
	posicion ASC
SQL;
$filas = mysqli_query($cnx, $consulta);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="js/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
	<meta charset="UTF-8">
	<title>Administración de Fotos</title>
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
			text-align: center;
		}
		.columna {
		  width:33%;
		  float:left;
		}

	</style>
	<script LANGUAGE="JavaScript">
        function confirmDel(url){
          //var agree = confirm("¿Realmente desea eliminarlo?");
          if (confirm("¿Realmente desea elimiminar esta foto y todas sus fotos relativas también?"))
               window.location.href = url;
                else
                 return false ;
              }
    </script>
    <script LANGUAGE="JavaScript">
        function confirmDelete(url){
          //var agree = confirm("¿Realmente desea eliminarlo?");
          if (confirm("¿Realmente desea elimiminar los datos de la ficha?"))
               window.location.href = url;
                else
                 return false ;
              }
    </script>
</head>
<body>
	<div class="container">
	<h1>Panel de Control</h1>
	<div class="columna" id="panel">
	<h2>Administración de fotos</h2>

	<!-- <div id="fotos"> -->
	<?php
		while( $columna = mysqli_fetch_assoc($filas)){
			echo "<div class='car'>
				<p>Marca: $columna[marca]</p>
				<p>Modelo: $columna[modelo]</p>
				<p>Año: $columna[anio]</p>
				<p>Precio: $columna[precio]</p>
				<p>Kilometraje: $columna[kilometraje] Kms.</p>
				<p>Estado: $columna[estado]</p>
				<img src='../fotos/$columna[archivo]' height='100' />
				<p><a href='agregar_fotos.php?id_foto=$columna[id_foto]'>Agregar Fotos</a> | <a href='editar_foto.php?id_foto=$columna[id_foto]'>Editar</a> | <a href='cambiar_foto.php?id_foto=$columna[id_foto]'>Cambiar Foto</a> | <a href='eliminar_foto.php?id_foto=$columna[id_foto]&file_name=$columna[archivo]' onclick='if(confirmDel() == false){return false;}'>Eliminar</a></p><p><a href='ficha.php?id_foto=$columna[id_foto]'>Administrar Ficha</a> | <a href='editar_ficha.php?id_foto=$columna[id_foto]'>Editar Ficha</a> | <a href='eliminar_ficha.php?id_foto=$columna[id_foto]' onclick='if(confirmDelete() == false){return false;}'>Eliminar Ficha</a></p>
				</div>";
		}

	?>
	</div>
	<div class="columna" id="subir_nuevo">
<table>
	<tr>
		<td>
			<form method="post" enctype="multipart/form-data" action="administrar_fotos_upload.php">
				<input type="hidden" name="idgaleria" value="<?php echo $id; ?>" />
				<div>
					<label>Marca</label>
					<input type="text" name="marca" />
					<label>Modelo</label>
					<input type="text" name="modelo" />
					<label>Año</label>
					<input type="text" name="anio" />
					<label>Kilometraje</label>
					<input type="text" name="kilometraje" />
					<label>Precio</label>
					<input type="text" name="precio" placeholder="sin puntos ni signo peso"/>
					<label>Archivo</label>
					<input type="file" name="imagenes[]" multiple/>
				</div>
				<input type="submit" value="agregar fotos" />

			</form>
		</td>
	</tr>
</table>
	<p><a href="../usados.php">Ir a la Galeria</a></p>
	<p><a href="index.php">Salir</a></p>
</div>
</div>
</body>
</html>