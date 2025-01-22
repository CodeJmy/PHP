<?php
// On commence par créer la session
session_start();
require('db.php');

// Je vais regarder si j'ai une recherche en cours en GET
if(isset($_POST['submit'])) 
{
    // Je vérifie avec emptyy si il y a bien un terme de
    if(!empty($_POST['email']) && !empty($_POST['motdepasse']))
    {
        // Je sécurise la recherche avec strip_tags
        $email = strip_tags($_POST['email']);
        $motdepasse = strip_tags($_POST['motdepasse']);
        // Je prépare ma requête
        $sql = 'SELECT email_utilisateur,motdepasse_utilisateur,nom_utilisateur,prenom_utilisateur,id_utilisateur
        FROM utilisateurs
        WHERE (email_utlisateur = :email)';
        $req = $dbh->prepare($sql);
        
        // Je bind mes paramètres
        $req->bindParam(':email',$email,PDO::PARAM_STR);
    
        // Je lance ma requête
        if($req->execute())
        {
            $nb_resultat = $req->rowCount();
            // Je vérifie si j'ai au moins un resultat supérieur à 0
            if($nb_resultat > 0)
            {
                // Si la requête réussie
                $resultats = $req->fetch(PDO::FETCH_ASSOC);
                if(password_verify($motdepasse, $resultats['motdepasse_utilisateur']))
                {
                    setcookie('userMail', $resultats['email_utilisateur'], (time()+3600));
                    setcookie('userNom', $resultats['nom_utilisateur'], (time()+3600));
                    setcookie('userPrenom', $resultats['prenom_utilisateur'], (time()+3600));
                    setcookie('userMdp', $resultats['motdepasse_utilisateur'], (time()+3600));
                    setcookie('userId', $resultats['id_utilisateur'], (time()+3600));
                    // Je génère un token
                    $token = genererToken();
                    // Je redirige vers la page membres
                    header('location:membres.php?token='.$token);
                }
                else
                {
                    echo 'Mot de passe incorrect';
                }
            }
            else 
            {
                echo 'erreur nb_resultat';
            }
        }
        else
        {
            echo 'erreur requete';
        }
    }
    else
    {
        echo 'Veuillez remplir tous les champs';
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