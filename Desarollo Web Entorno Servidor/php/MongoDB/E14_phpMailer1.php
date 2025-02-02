<?php

use PHPMailer\PHPMailer\PHPMailer;

// Asegúrate de tener autoload.php de Composer
require dirname(__FILE__) . '/vendor/autoload.php';

// Inicializar el objeto PHPMailer
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug  = 2; // Cambiar a 0 para no mostrar mensajes de depuración
$mail->SMTPAuth   = true;
$mail->SMTPSecure = 'tls';
$mail->Host       = 'smtp.gmail.com'; // Usar el servidor SMTP de Gmail
$mail->Port       = 587;              // Puerto para TLS

// Ingresar tus credenciales de Google
$mail->Username = 'pyjoso3vitaslim@gmail.com';         // Tu dirección de correo electrónico
$mail->Password = ''; // Contraseña de la aplicación, si tienes activado 2FA

// Establecer el remitente y el asunto
$mail->setFrom('pyjoso3vitaslim@gmail.com', 'Test');
$mail->Subject = 'Correo de prueba';

// Definir el cuerpo del mensaje
$mail->msgHTML('Este es un correo de prueba enviado usando PHPMailer.');

// Agregar archivo adjunto
// $mail->addAttachment('adjunto_test.xsd');

// Destinatario
$address = 'js.backups.03@gmail.com';
$mail->addAddress($address, 'Test');

// Enviar el correo
$result = $mail->send();

// Verificar si hubo éxito en el envío
if (! $result) {
    echo '<br>ERROR DE ENVÍO: ' . $mail->ErrorInfo;
} else {
    echo 'Correo enviado exitosamente';
}

?>