<?php 
include('_setup.php');
include("funciones.php");
$id_foto=$_POST['id'];
$nombre_file = mktime() .'.jpg';

$consulta = <<<SQL
INSERT INTO
	fotos_hijas
SET
	id_foto_auto='$id_foto',
	archivo_hija='$nombre_file'
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
	 			$se_subio_imagen=subir_imagenes($typeimg[$i],$tempimg[$i],$solonom,"../fotos2/",500);
	 		
	 		    echo $se_subio_imagen."<br>";

	 		}
	 	
	 	}
	 	
	}
}
}
datos($_FILES);
header("Location: agregar_fotos.php?id_foto=$id_foto");
?>