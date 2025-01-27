<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
var_dump($_SERVER['REMOTE_ADDR']);

// Je vais rappelle a la connexion de ma BD en rappelant les fonction de ma page db.php
require ('vendor/autoload.php');
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
    
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'dwwm2425.fr';                          //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'contact@dwwm2425.fr';                     //SMTP username
        $mail->Password   = '!cci18000Bourges!';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
        //Recipients
        $mail->setFrom('no-reply@dww2425.fr', 'Formulaire contact from - monSite'); // Email d'envoi
        $mail->addAddress($_SESSION['email']); //Email pour recevoir les mails (nom optionel)


         //Content
         $mail->isHTML(true); //Set email format to HTML
         $mail->Subject = 'Adresse IP'; // Objet du message
         $mail->Body    = $_SERVER['REMOTE_ADDR']; // Contenu du message
         $mail->AltBody = $_SERVER['REMOTE_ADDR']; // Contenu alternatif du message
 

         $mail->send();
         
         echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

?>
<!DOCTYPE html>
<html lang="fr"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membre</title>
</head>
<body>
    <h1>ESPACE MEMBRE</h1>
</body>
</html>