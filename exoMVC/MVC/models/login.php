<?php
// Fonction pour verifier l'email et le mot de passe

function verifierMembres($email, $password)
{
    // j'ouvre le fichier dans une variable $fichier
    $fichier = fopen('membres.csv', 'r');
    // si le fichier est ouvert
    if($fichier !== false)
    {
        // Je boucle sur chaque ligne du fichier
        while(($ligne = fgetcsv($fichier, 1000, ';'))!== false)
        {
            // Si l'email et le mot de passe correspondent à une ligne du fichier
            if($ligne[0] === $email && password_verify($password, $ligne[1]))
            {
                // Je ferme le fichier
                fclose($fichier);
                // Je retourne vrai
                return true;
            }
        }
        // Si aucune correspondance n'est trouvée, je ferme le fichier
        fclose($fichier);
        // Je retourne faux
        return false;
    }
}
// Fonction pour générer le TOKEN
function genererToken()
{
    // Chaine de caractère pour le token
    $chaine = 'èazertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789&é"(-è_çà)=';
    // Je transforme ma chaine en tableau
    $tableau = mb_str_split($chaine);
    // Je compte le nombre d'éléments dans le tableau
    $longueur = count($tableau);
    // J'initialise une variable token vide
    $token = '';
    // On vas générer une clé aléatoire avec une boucle for avec une longueur comprise entre 16 et 30
    for ($i = 0; $i < rand(16,30);$i++) 
    {
        // J'ajoute un caractère au token à chaque itération
        $token.= $tableau[rand(0,$longueur-1)];
    }
    // Je hashe le token
    $token = md5(sha1($token));
    // J'enregistre mon token dans une session
    $_SESSION['token'] = $token;
    // Je retourne le token généré
    return $token;
}