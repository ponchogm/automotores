<?php 
	/*
			el parametro de $extension determina que tipo de imagen no se borrara por ejemplo si es jpg significa que la imagen
			con extension .jpg sequeda en el servidor y si existen imagenes con el mismo nombre pero diferente extension
			png  o gif se eliminara con esta funcion evito tener imagenes duplicadas con distintas extensiones para cada perfil
			 la funcion file_exists evalua si un archivo existe y la funcion unlink borra un archivo del servidor		 */
		 function borrar_imagenes($ruta,$extension)
		{
			
			switch ($extension) {
				case '.jpg':
					if(file_exists($ruta.".png"))
						unlink($ruta.".png");
					if(file_exists($ruta.".gif"))
						unlink($ruta.".gif");
					break;
				case '.gif':
					if(file_exists($ruta.".png"))
						unlink($ruta.".png");
					if(file_exists($ruta.".jpg"))
						unlink($ruta.".jpg");
					break;
				case '.png':
					if(file_exists($ruta.".jpg"))
						unlink($ruta.".jpg");
					if(file_exists($ruta.".gif"))
						unlink($ruta.".gif");
					break;		
				
				
			}
		}
	//funcion para subir imagenes en php
	function subir_imagenes($tipo,$imagen,$mail,$ruta,$size)
	{
		//strstr($cadena1,$cadena2) sirve para evaluar si en la primer cadena de texto
			//existe la segunda cadena de texto 
			//si dentro del tipo del archivo se encuentra la palabra  image significa que el
			//archivo es una imagen
			if(strstr($tipo,"image"))
			{
				//El archivo si es una imagen ahora valido que tipo de imagen es tomo la extension
				//del archivo
				if(strstr($tipo,"jpeg"))
					$extension=".jpg";
				else if(strstr($tipo,"gif"))
					$extension=".gif";
				else if(strstr($tipo,"png"))
					$extension=".png";
				//para saber si la imagen tiene el ancho correcto es de 420px
				$tam_img=getimagesize($imagen);
				$ancho_img=$tam_img[0];
				$alto_img =$tam_img[1];
				$ancho_img_deseado=$size;

				//sii la imagen es maor en su ancho a 420px reajusto su tamaño
					if($ancho_img > $ancho_img_deseado)
					{
						//reajustamos
					//por una regla de tres obtengo el alto de la imagen de manera 
					//proporciaonal  el ancho  nuevo  que sera 420
					$nuevo_ancho_img = $ancho_img_deseado;
					$nuevo_alto_img=($alto_img*$nuevo_ancho_img)/$ancho_img;
					//CREO UNA IMAGEN EN COLOR REAL CON LA NUEVAS DIMENSIONES
					
					$img_reajustada=imagecreatetruecolor($nuevo_ancho_img, $nuevo_alto_img);
					//CREO UNA IMAGEN BASADA EN LA ORIGINAL DEPENDIENDO DE SU EXTENSION ES EL TIPO QUE CREARE
					switch ($extension) {
						case '.jpg':

					
							 $img_original=imagecreatefromjpeg($imagen);
							 //REAJUSTO LA IMAGEN NUEVA CON RESPETO ALA ORIGINAL 
							 imagecopyresampled($img_reajustada, $img_original, 0, 0, 0, 0, $nuevo_ancho_img, $nuevo_alto_img, 
							 	$ancho_img, $alto_img);
							 //Guardo la imagen  reescalada en el servidor 
							 $nombre_img_ext=$ruta.$mail.$extension;
							 $nombre_img=$ruta.$mail;
							 imagejpeg($img_reajustada,$nombre_img_ext,100);
							 //ejecuto la funcion para borrar posibles imagenes dobles del perfil
							 borrar_imagenes($nombre_img,".jpg");
							break;
						case '.gif':

					
							  $img_original=imagecreatefromgif($imagen);
							 //REAJUSTO LA IMAGEN NUEVA CON RESPETO ALA ORIGINAL 
							 imagecopyresampled($img_reajustada, $img_original, 0, 0, 0, 0, $nuevo_ancho_img, $nuevo_alto_img, 
							 	$ancho_img, $alto_img);
							 //Guardo la imagen  reescalada en el servidor 
							 $nombre_img_ext=$ruta.$mail.$extension;
							 $nombre_img=$ruta.$mail;
							 imagegif($img_reajustada,$nombre_img_ext,100);
							 //ejecuto la funcion para borrar posibles imagenes dobles del perfil
							 borrar_imagenes($nombre_img,".gif");
							break;
						case '.png':

							
							   $img_original=imagecreatefrompng($imagen);
							 //REAJUSTO LA IMAGEN NUEVA CON RESPETO ALA ORIGINAL 
							 
        						imagesavealpha($img_reajustada, true);
        						imagealphablending($img_reajustada, false);	
							 imagecopyresampled($img_reajustada, $img_original, 0, 0, 0, 0, $nuevo_ancho_img, $nuevo_alto_img, 
							 	$ancho_img, $alto_img);
							 imagecolortransparent($img_reajustada);
							 //Guardo la imagen  reescalada en el servidor 
							 $nombre_img_ext=$ruta.$mail.$extension;
							 $nombre_img=$ruta.$mail;
							 imagepng($img_reajustada,$nombre_img_ext,0);
							 //ejecuto la funcion para borrar posibles imagenes dobles del perfil
							 borrar_imagenes($nombre_img,".png");
							break;
					}
					
					}
					else
					{
						//no se reajusta y se sube
					$destino=$ruta.$mail.$extension;

					//Se sube la foto
					move_uploaded_file($imagen,$destino) /*or die("No se pudo subir la imagen")*/;

					//ejecuto la funcion para borrar posibles imagenes dobles para el perfil
					$nombre_img=$ruta.$mail;
					borrar_imagenes($nombre_img,$extension);
					}
					//Asigno el nombre que el que se guardara en la base de datos
					$imagen=$mail.$extension;
					return $imagen;
			}
			else
			{
				return "La imagen".$imagen." No se subio";
			}

	}
?>