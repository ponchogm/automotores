<?php
$nombre=$_POST['name'];
$correo_des=$_POST['email'];
$fono=$_POST['phone'];
$mensaje=$_POST['mensaje'];

//var_dump($_POST);
//break;
// Varios destinatarios
$correo = "contacto@automotoreslimitada.cl, clealmayorga@gmail.com";
//$correo = "luis.garcia@umce.cl";
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
  <p>Ha llegado una consulta desde la página de contacto</p>
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
            alert('Documento enviado exitosamente!');window.location.href=\"contacto.html\"</script>";
?>