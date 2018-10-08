<?php
$nombre=$_POST['nombre'];
$correo_des=$_POST['correo'];
$fono=$_POST['fono'];
$direccion=$_POST['direccion'];
$pie=$_POST['pie'];
$pago=$_POST['pago'];
$tiempo=$_POST['tiempo'];
$mensaje=$_POST['mensaje'];

// Varios destinatarios
$correo = "contacto@automotoreslimitada.cl, clealmayorga@gmail.com";
$remitente  = $correo; // atención a la coma

// título
$titulo = 'Mensaje enviado desde Automotoreslilimitada.cl';

// mensaje
$mensaje = '
<html>
<head>
  <title>Mensaje enviado desde Automotoreslilimitada.cl</title>
</head>
<body>
  <p>Ha llegado una consulta sobre financiamiento</p>
  <table width="500" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="160">Nombre</td>
      <td width="340">'.$nombre.'</td>
    </tr>
    <tr>
      <td>Correo</td>
      <td>'.$correo_des.'</td>
    </tr>
    <tr>
      <td>Teléfono</td>
      <td>'.$fono.'</td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td>'.$direccion.'</td>
    </tr>
    <tr>
      <td>Pie</td>
      <td>'.$pie.'</td>
    </tr>
    <tr>
      <td>Auto en parte de pago</td>
      <td>'.$pago.'</td>
    </tr>
    <tr>
      <td>Plazo para comprar</td>
      <td>'.$tiempo.'</td>
    </tr>
    <tr>
      <td>Mensaje</td>
      <td>'.$mensaje.'</td>
    </tr>
  </table>
  <p>&nbsp;</p>
</body>
</html>
';
// Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
//$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Automotores Limitada <contacto@automotoreslimitada.cl>' . "\r\n";
//$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Mail it
mail($remitente, $titulo, $mensaje, $cabeceras);

echo"<script type='text/javascript'>
            alert('Documento enviado exitosamente!');window.location.href=\"financiamiento.html\"</script>";
?>