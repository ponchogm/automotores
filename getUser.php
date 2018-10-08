<?php
include('_setup.php');
$var=$_GET['q'];
$consulta = <<<SQL
SELECT *
FROM fotos, fotos_hijas, detalles

WHERE fotos.id_foto = fotos_hijas.id_foto_auto 
AND fotos.id_foto = detalles.id_foto_auto 
AND fotos.id_foto = '$var'

SQL;
$filas = mysqli_query($cnx, $consulta);
$columna = mysqli_fetch_assoc($filas);
$precio = number_format($columna['precio'], 0, ',', '.');
$marca = $columna['marca'];
$modelo = $columna['modelo'];
$anio = $columna['anio'];
$version = $columna['version'];
$color = $columna['color'];
$puertas = $columna['puertas'];
$combustible = $columna['combustible'];
$techo = $columna['techo'];
$tapiz = $columna['tapiz'];
$cilindrada = $columna['cilindrada'];
$kilometraje = $columna['kilometraje'];
//$transmision = $columna['transmision'];
$traccion = $columna['traccion'];
$aire = $columna['aire'];
$cierre = $columna['cierre'];
$cd = $columna['cd'];
$alzavidrios = $columna['alzavidrios'];
$asiento = $columna['asiento'];
$usb = $columna['usb'];
$alarma = $columna['alarma'];
$espejos = $columna['espejos'];
$aircon = $columna['aircon'];
$aircop = $columna['aircop'];
$airlat = $columna['airlat'];
$frenos = $columna['frenos'];
$abs = $columna['abs'];
$comentarios = $columna['comentarios'];

?>

    <section class="slider-car">
        <div class="slider">
          <input type="radio" name='slide_switch' id="id1" checked="checked" />
          <label for="id1">
            <img src="fotos/<?php echo $columna['archivo']; ?>" width="100"/>
          </label>
           <img src="fotos/<?php echo $columna['archivo']; ?>" width="500" height="300"/>

            <?php
                $id=2;
                while( $columna = mysqli_fetch_assoc($filas)){
            ?>
                    <input type="radio" name="slide_switch" id="id<?php echo $id; ?>" />
                        <label for="id<?php echo $id; ?>">
                            <img src="fotos2/<?php echo $columna['archivo_hija']; ?>" width="100"/>
                        </label>
                        <img src="fotos2/<?php echo $columna['archivo_hija']; ?>" width="500" height="300"/>
            <?php
                    $id++;
                }
            ?>
        </div>
    </section>
<section class='data-car'>
    <div class='data-header'>
          <h2><?php echo $marca."-".$modelo; ?></h2>
          <h3>$<?php echo $precio; ?></h3>
        <p>Automotores Limitada - Claudio Leal Mayorga<br>
                22 920 78 85 - +56 9 81 65 04 59 <a href='contacto.html'>Me interesa este vehículo!</a></p>
        <a href="javascript:printDiv('Ficha')">
        <span class='glyphicon glyphicon-print'></span>&nbsp;Imprimir</a>
    </div>

     <div class='table overflow'>
        <div id='tabGeneral' class='tab-pane active fade in'>
            <div class='col-md-12 hidden-xs DIVdetalleGeneralTable' id="Ficha">
                <table class='table table-striped detalleGeneralTable'>
                    <tbody>
                        <tr>
                            <td><strong>Marca</strong></td>
                            <td colspan='2'><?php echo $marca; ?></td>
                            <td><strong>Año</strong></td>
                            <td><?php echo $anio; ?></td>
                        </tr>
                        <tr>
                        <td><strong>Modelo</strong></td>
                            <td><?php echo $modelo; ?></td>
                            <td>&nbsp;</td>
                            <td><strong>Versión</strong></td>
                            <td><?php echo $version; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Color</strong></td>
                            <td><?php echo $color; ?></td>
                            <td>&nbsp;</td>
                            <td><strong>Nº puertas</strong></td>
                            <td><?php echo $puertas; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Combustible</strong></td>
                            <td><?php echo $combustible; ?></td>
                            <td>&nbsp;</td>
                            <td><strong>Techo</strong></td>
                            <td><?php echo $techo; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Cilindrada</strong></td>
                            <td><?php echo $cilindrada; ?></td>
                            <td>&nbsp;</td>
                            <td><strong>Kilometraje</strong></td>
                            <td><?php echo $kilometraje; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Transmisión</strong></td>
                            <td><?php echo $version; ?></td>
                            <td>&nbsp;</td>
                            <td><strong>Tapiz</strong></td>
                            <td><?php echo $tapiz; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tracción</strong></td>
                            <td><?php echo $traccion; ?></td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <table class='table table-striped detalleGeneralTable'>
                    <tbody>
                        <tr>
                            <td><strong>Equipamiento</strong></td>
                            <td colspan='4'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong>Aire Acondicionado</strong></td>
                            <td><?php echo $aire; ?></td>
                            <td>&nbsp;</td>
                            <td><strong>Cierre centralizado</strong></td>
                            <td><?php echo $cierre; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Radio  CD - CDMP3</strong></td>
                            <td><?php echo $cd; ?></td>
                            <td>&nbsp;</td>
                            <td><strong>Alzavidrios eléctricos</strong></td>
                            <td><?php echo $alzavidrios; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Asiento trasero abatible</strong></td>
                            <td><?php echo $asiento; ?></td>
                            <td>&nbsp;</td>
                            <td><strong>Radio USB/MP3</strong></td>
                            <td><?php echo $usb; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Alarma</strong></td>
                            <td><?php echo $alarma; ?></td>
                            <td>&nbsp;</td>
                            <td><strong>Espejos regulables desde el interior</strong></td>
                            <td><?php echo $espejos; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Airbag acompañante</strong></td>
                            <td><?php echo $aircop; ?></td>
                            <td>&nbsp;</td>
                            <td><strong>Airbag conductor</strong></td>
                            <td><?php echo $aircon; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Frenos de disco traseros</strong></td>
                            <td><?php echo $frenos; ?></td>
                            <td>&nbsp;</td>
                            <td><strong>Airbag laterales delanteros</strong></td>
                            <td><?php echo $airlat; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Sistema de frenos ABS</strong></td>
                            <td><?php echo $abs; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong>Comentarios</strong></td>
                            <td colspan='4'><?php echo $comentarios; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- Fin div DIVdetalleGeneralTable-->
        </div> <!-- Fin div tabGeneral-->
    <!--</div>Fin div table-->
  </section>
