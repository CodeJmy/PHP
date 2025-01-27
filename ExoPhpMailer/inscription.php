<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
// Je vais rappelle a la connexion de ma BD en rappelant les fonction de ma page db.php
require_once ('db.php');
// Je créer une variable générer token
$token = genererToken();
// Je vais préparer ma requête SQL d'insertion afin de pouvoir communiqué avec mon formulaire d'inscription
$requete = $dbh->prepare('INSERT INTO users (nom, prenom, email, date, cle) VALUES (:nom,:prenom,:email,CURDATE(), :cle)');
$requete->bindValue(':nom',$_POST['nom'],PDO::PARAM_STR);
$requete->bindValue(':prenom',$_POST['prenom'],PDO::PARAM_STR);
$requete->bindValue(':email',$_POST['email'],PDO::PARAM_STR);
$requete->bindValue(':cle',$token,PDO::PARAM_STR);
// J'éxécute maintenant ma requête
if($requete->execute())
{
    echo 'Votre inscription à bien été prise en compte !';
} else {
    echo "Erreur d'inscription";
}

if(isset($_POST['submit']))
{

// Si tout les champs ont une valeur
if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']))
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
         $mail->addAddress('jmyvang@gmail.com', 'Vang Pao Jimmy');                                       // Adresse destinataire         // Adresse de la personne qui remplis le formulaire

         //Content
         $mail->isHTML(true);                              
         $fichier = file_get_contents('mail.html');
         $fichier = str_replace('[PRENOM]',$_POST['prenom'],$fichier);
         $fichier = str_replace('[NOM]',$_POST['nom'],$fichier);
         $fichier = str_replace('[CLE]',$token,$fichier);
         $mail->Body = $fichier;

         $mail->send();
         
         echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
}
}
function genererToken(){
    // Chaine de caractère pour le token
    $chaine = 'azertyuiopqsdfhjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789&é"(-è_çà)=';
    // Je transforme ma chaine en tableau
    $tableau = mb_str_split($chaine);
    // Je calcule la taille de la chaine de caractère avec count
    $longeur = count($tableau);
    // J'initialise une variable token vide
    $token = '';
    // On va générer une clé aléatoire avec une boucle for avec une longueur random entre 16 et 30
    for($i=0;$i<rand(16,30);$i++){
        // J'ajoute un caractère au token à chaque itération
        $token.= $tableau[rand(0,$longeur - 1)];
    }
    // Je hashe le token
    $token = md5(sha1($token));
    // J'enregistre mon token dans une session
    $_SESSION['token'] = $token;
    // Une fois mon token terminé je le retourne
    return $token;
}
?>