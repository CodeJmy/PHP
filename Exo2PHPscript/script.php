<?php
// Je démarre une session 
session_start();

// Fonction SauvegarderUtilisateur
function sauvegarderUtilisateur($NomUser)
    {
        $_SESSION['name'] = $NomUser;
    }

if (isset($_GET['submit']))
{
    if (isset($_GET['name']))
    {
        sauvegarderUtilisateur($_GET['name']);

    }
    else
    {
        echo "Veuillez remplir le champ 'name'";
    }
}

if (isset($_SESSION['name']))
{
    echo "Bienvenue ". $_SESSION['name']."!";
}

// Si l'utilisateur clique sur "Déconnexion"
    if (isset($_GET["sedeconnecter"]))
    {
        session_destroy();
        header("Location: Exo2PHPscript\script.php");
        exit();
    }

?>