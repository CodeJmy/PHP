<?php
session_start();// Je démarre la session
require_once('function.php'); // Je charge le fichier function.php
if(verifierToken($_GET["token"]))
{
    // Si vérifier token return true alors on accès à la page
    echo 'bienvenue';
}
else
{
    // Si le token n'est plus bon
    echo 'dégage';
}


?>