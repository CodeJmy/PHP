<?php
// Je crée mes variables nom et age

$nom = $_GET['nom'];
$age = $_GET['age'];

//Fonction afficher les informations 
function afficher($nom, $age)
{
    echo "Bonjour $nom, vous avez $age ans.";
}

// Fonction pour afficher message d'erreur

function erreur()
{
    echo 'Erreur : Les paramètres "nom" et "age" ne sont pas dans URL';
}

// Vérification des paramètres "nom" et "age" dans l'URL

if (isset($nom) && isset($age))
{
    $nom = htmlspecialchars($nom);
    $age = htmlspecialchars($age);
    afficher($nom, $age);
}
else
{
    erreur();
}
?>