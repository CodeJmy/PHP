<?php
// Fonction pour vérifier le token
function verifierToken($cle)
{
    if($_SESSION['token'] === $cle)
    {

        return true;
    }
    else 
    {

        return false;
    }
}
?>