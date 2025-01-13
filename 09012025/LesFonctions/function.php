<?php
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
// Fonction pour verifié le token
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
function genererMotDePasse($param=array())
{
    // Je creer un tableau avec des valeurs par défaut
    $defaut = [
        'longueur' => 16,
        'speciaux' => 3,
        'maj' =>3,
        'chiffres' => 4
    ];
    // Je fusionne mes tableaux
    $param = array_merge($defaut, $param);
    // Je crée mes 4 Chaine de caractères
    $chaine = 'azertyuiopqsdfghjklmwxcvbn';
    $majuscule = 'AZERTYUIOPQSDFGHJKLMWXCVBN';
    $chiffres = '0123456789';
    $speciaux = '!@#$%^&*()-_=+[]{}|;:,.<>/?';
    // Je transforme les chaines de caractères en tableaux
    $chaine = mb_str_split($chaine);
    $majuscule = mb_str_split($majuscule);
    $chiffres = mb_str_split($chiffres);
    $speciaux = mb_str_split($speciaux);
    // j'initialise un tableau vide pour le mot de passe
    $password = [];
    // J'enregistre le nombre de caractères présent dans le password
    $nb_carac = (int) $param['speciaux']+$param['maj']+$param['chiffres'];
    // Je vérifie si nm_carac est bien inférieur ou égal à la longueur
    if ($nb_carac <= $param['longueur'])
    {
        // Je fais une boucle pour sélectionner mes caractères spéciaux
        for ($i = 0; $i < $param['speciaux']; $i++)
        {
            // Je vais ajouter au tableau un caractère spécial au hasard
            $password[] = $speciaux[rand(0, count($speciaux)-1)];
        }
        // Je fais une boucle pour sélectionner mes caractères majuscules
        for ($i = 0; $i < $param['maj']; $i++)
        {
            // Je vais ajouter au tableau une majuscule au hasard
            $password[] = $majuscule[rand(0, count($majuscule)-1)];
        }
        // Je fais une boucle pour sélectionner mes caractères chiffres
        for ($i = 0; $i < $param['chiffres']; $i++)
        {
            // Je vais ajouter au tableau un chiffre au hasard
            $password[] = $chiffres[rand(0, count($chiffres)-1)];
        }
        // Je fais une boucle pour les autres caractères
        for ($i = 0; $i < $param['longueur'] - $nb_carac; $i++)
        {
            // Je vais ajouter un caractère aléatoire au hasard
            $password[] = $chaine[rand(0, count($chaine)-1)];
        }
        // Je mélange les éléments du tableau avec shuffle
        shuffle($password);
        // Je transforme le tableau en chaine de caractères avec implode
        $password = implode('',$password);
        // Je retourne le mot de passe généré
        return $password;
    }
    return false; // si tout ne se passe pas comme prévu
}

?>