<?php

//var_dump($_POST); Verifico lo que llega como POST y Files
//var_dump($_FILES);
include("funciones.php");
include('_setup.php');
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$anio = $_POST['anio'];
$precio = $_POST['precio'];
$kilometraje = $_POST['kilometraje'];
$fkgaleria = $_POST['idgaleria'];
$estado = 'Disponible';
$nombre_file = mktime() .'.jpg';
$posicion = 0;

$consulta = <<<SQL
INSERT INTO
	fotos
SET
	marca='$marca',
	modelo='$modelo',
	anio='$anio',
	precio='$precio',
	kilometraje='$kilometraje',
	archivo='$nombre_file',
	estado='$estado',
	posicion='$posicion',
	fkgaleria='$fkgaleria'
SQL;

mysqli_query($cnx, $consulta);
function datos($files)
	{
		if(!empty($files))
	 {
	 	 $imagenes=$files["imagenes"]["name"];
	 	 $errorimg =$files["imagenes"]["error"];
	 	 @$tempimg = $files["imagenes"]["tmp_name"];
	 	 $typeimg =$files["imagenes"]["type"];
	 	

	 $j=0;
	 $tipos=array("image/jpg","image/jpeg","image/png","image/gif");
	 	
	 for ($i=0; $i <count($imagenes) ; $i++) { 
	 	if($errorimg[$i] == 0)
	 	{
	 		if(in_array($typeimg[$i], $tipos))
	 		{
	 			$k=$j++;
	 			$nombre_file = mktime() .'.jpg';
	 			$solonom= str_replace(".jpg", "", $nombre_file);
	 			// $b=rand(20,30);
	 			$se_subio_imagen=subir_imagenes($typeimg[$i],$tempimg[$i],$solonom,"../fotos/",500);
	 		
	 		    echo $se_subio_imagen."<br>";

	 		}
	 	
	 	}
	 	
	}
}
}
datos($_FILES);
header("Location: administrar_fotos.php?id=$fkgaleria")
?>