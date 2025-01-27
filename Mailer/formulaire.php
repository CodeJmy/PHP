<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
// Je vérifie si le champs captcha est égal à la session
if(isset($_POST['submit']))
{
    echo 'Retourne chez ta mère !!!';
    exit;
}
// Si tout les champs ont une valeur
if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['sujet']) && !empty($_POST['message']))
{
    // Je vais charger PHPMailer
    //Load Composer's autoloader
    require 'vendor/autoload.php';
        
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'dwwm2425.fr';                          //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'contact@dwwm2425.fr';                     //SMTP username
        $mail->Password   = '!cci18000Bourges!';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
        //Recipients
         $mail->setFrom('devdev@dwwm2425.fr', 'Formulaire contact - mon site');                                      // Adresse expéditeur
         $mail->addAddress('jimmy.vangpao@campuscci18.fr', 'Vang Pao Jimmy');                                       // Adresse destinataire
         $mail->addReplyTo(strip_tags($_POST['email']), strip_tags($_POST['nom']), 'Je réponds jamais');           // Adresse de la personne qui remplis le formulaire

         //Content
         $mail->isHTML(true);                              
         $mail->Subject = strip_tags($_POST['sujet']);
         $mail->Body    = $_POST['message'];
         $mail->AltBody = strip_tags($_POST['message']);
         
         $mail->send();
         
         echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
}

?>