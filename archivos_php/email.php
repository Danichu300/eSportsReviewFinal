<?php
//Script para enviar emails

require("../PHPMailer/src/PHPMailer.php");
$mail = new PHPMailer();

//Luego tenemos que iniciar la validación por SMTP:
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = "smtp.gmail.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
$mail->Port = 465; // Puerto de conexión al servidor de envio. 
$mail->Username = "esports.servicio.clientes@gmail.com"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
$mail->Password = "LiqxTMYzn6P4pcqWJVs4"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
$mail->setFrom("esports.servicio.clientes@gmail.com"); // A RELLENARDesde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
$mail->FromName = "eSports Service"; //A RELLENAR Nombre a mostrar del remitente. 
$mail->AddAddress($_POST['admins']); // Esta es la dirección a donde enviamos 
$mail->IsHTML(true); // El correo se envía como HTML 
$mail->Subject = $_POST['subject']; // Este es el titulo del email. 
$body = $_POST['message']; // Mensaje a enviar. $exito = $mail->Send(); // Envía el correo.
$mail->send();
if($exito){ echo 'El correo fue enviado correctamente.'; }else{ echo 'Hubo un problema. Contacta a un administrador.'; } 

header("Location: ../home.html");

?>

# Try running this locally.
# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-3ax6xnjp29jd6fds4gc373sgvjxteol0');
$domain = "samples.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
  array('from'    => 'Excited User <excited@samples.mailgun.org>',
        'to'      => 'Mailgun Devs <devs@mailgun.net>',
        'subject' => 'Hello',
        'text'    => 'Testing some Mailgun awesomeness!'));