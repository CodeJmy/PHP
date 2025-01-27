<?php
$fichier = file_get_contents('mail.html');
$fichier = str_replace('[PRENOM]',$_POST['prenom'],$fichier);
$fichier = str_replace('[NOM]',$_POST['nom'],$fichier);
$fichier = str_replace('[CLE]',$token,$fichier);
$mail->body = $fichier;
?>