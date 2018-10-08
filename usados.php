<?php
include('_setup.php');

$consulta = <<<SQL
SELECT
*
FROM
  fotos
WHERE
  fkgaleria = 1
ORDER BY
  posicion ASC
SQL;
$filas = mysqli_query($cnx, $consulta);
?>
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='utf-8'>
<title>Stock de Vehículos</title>
   <!--  <link rel='stylesheet' media='screen' href='css/auto.css' /> -->
    <meta name='viewport' content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <link rel='stylesheet' media='screen' href='css/personalizado.css' />
    <link rel='stylesheet' media='screen' type='text/css' href='css/default.css' />
    <link rel='stylesheet' media='screen' type='text/css' href='css/component.css' />
    <link href="css/responsive.css" rel="stylesheet">
    <!-- <link href="css/estilos2.css" rel="stylesheet"> -->
    <link href="css/responsive-slider.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Metrophobic' rel='stylesheet' type='text/css'>
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/estilos2.css" rel="stylesheet">
    <!-- <link rel='stylesheet' media='screen' type='text/css' href='css/mislider.css' />
    <link rel='stylesheet' media='screen' type='text/css' href='css/mimodal.css' /> -->
    <script>
      function showUser(id) {
        if (id == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","getUser.php?q="+id.getAttribute("data-id"),true);
            xmlhttp.send();
        }
    }
    </script>

    <style>
      body {
        background-color: #000;
      }
      footer{background-color: #fff;}
    </style>
<script type="text/javascript">
    
    function printDiv(Ficha) {
     var contenido= document.getElementById(Ficha).innerHTML;
     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();

     document.body.innerHTML = contenidoOriginal;
}

</script>
</head>
<header>

            <div class="container">
                <div class="row-fluid">
                    <div id="logo" class="col-md-4">
                        <a href="index.html"><img src="img/logo2.png" alt="Automotora Limitada" /></a>
                    </div>
                    <nav id="menu" class="col-md-8">
                        <a class="toggleMenu" href="#">Menu</a>
                        <ul class="menu clearfix">
                            <li><a href="index.html">Home</a></li>
                            <li class="active"><a href="#">Stock</a></li>
                            <li><a href="financiamiento.html">Financiamiento</a></li>
                <!--<li><a href="auto-en-prenda.html">Auto en Prenda</a></li>-->
                            <li><a href="consignacion.html">Consignación</a></li>
                            <li><a href="ubicacion.html">Ubicación</a></li>
                            <li><a href="contacto.html">Contacto</a></li>
                        </ul>
                    </nav>
              </div>
          </div>
        </header>
<body>
<section id="imagenPagina">

            <div id="sloganContacto" class="sloganPagina col-md-12">
                <h2 class="right contacto"></h2>
            </div>
        </section>
<section class="contenidoGeneral">
            <div id="tituloPaginas" class="col-md-3">
                <h3>Stock de Vehículos</h3>
            </div>
  <div class='container'>
  <div class='main'>
      <div class='grilla-vehi' style='padding-left:0;'><div class='estiloRoss'></div></div>
      <div id='cbp-vm' class='cbp-vm-switcher cbp-vm-view-grid'>

        <div class='row-fluid listaAutos'>
              <?php
          while( $columna = mysqli_fetch_assoc($filas)){
                  $precio = number_format($columna['precio'], 0, ',', '.');
            
            echo "<div class='grilla-vehi cadaAuto'>

                     <a class='cbp-vm-image' href='#modal1' data-id='".$columna['id_foto']."' onclick='showUser(this)'>
                      <div class='envThumb open-modal'><img src='fotos/".$columna['archivo']."' /></div>
                     </a>
                     <h3 class='cbp-vm-title'>".$columna['marca']."<br />".$columna['modelo']." - ".$columna['anio']."</h3>

                     <div class='cbp-vm-details'>".$columna['kilometraje']."Kms.</div>
                     <div class='cbp-vm-price' style='color:#00305A !important;'>$".$precio."</div>

                              <!--<div class='labelVendido'><span class='label label-success'>VENDIDO</span></div>-->
                            <div class='singlebutton'>
                      <a class='gwb_button_fixed' href='contacto.html'>".$columna['estado']."</a>
                    </div>
              </div>";

        }
        ?>
        <div id="modal1" class="modalmask">
          <div class="modalbox movedown">
             <a href="#close" title="Close" class="close">X</a>
                  <!-- Section -->
                  <div id="txtHint">
                    <h2>Presione la "X" para cerrar la ventana</h2>
                    <p><h3>Muchas Gracias!</h3></p>
                 </div> <!-- txtHint donde se carga el contenido dinámico-->
            </div>
         </div><!-- Ventana Modal-->
      </div>
    </div>
  </div>
</div>
<footer>
            <div id="foot" class="container">
                <div id="direcciones" class="row-fluid">
                    <div class="direccion">
                        <h4 class="tituloItem"></h4>
                        <p></p>
                        <a href="#"></a>
                    </div>

                    <div class="direccion">
                        <!--<h4 class="tituloItem">Casa Matriz</h4>
                        <p>Santa Victoria 387 Of. 1808 - Santiago</p>-->
                        <a href="#">+56 9 - 81 65 04 59</a>
                        <p>contacto@automotoreslimitada.cl</p>
                    </div>

                    <div class="direccion">
                        <h4 class="tituloItem"></h4>
                        <p></p>
                        <a href="#"></a>
                    </div>
            </div>

            <div id="menuFooter" class="container">
                <div class="row-fluid">
                    <ul>
                        <li><a href="index.html">Inicio</a></li>
                        <li><a href="usados.php">Stock</a></li>
                        <li><a href="financiamiento.html">Financiamiento</a></li>
                        <!--<li><a href="#">Auto en Prenda</a></li>-->
                        <li><a href="consignacion.html">Consignación</a></li>
                        <li><a href="ubicacion.html">Ubicación</a></li>
                        <li><a href="contacto.html">Contacto</a></li>
                    </ul>
                </div>
            </div>

            <div class="container">
                <div class="row-fluid"></div>
            </div>

        </footer>
</body>
</html>