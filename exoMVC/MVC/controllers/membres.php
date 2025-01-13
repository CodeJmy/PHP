<?php
// Je vérifie si ma fonction verifierToken renvoi false
if(verifierToken($_SESSION['token']) == false)
{
    // Si oui, je redirige vers la page de login
    header('location:index.php?route=login');
    exit; // Je stoppe le script
}
?>