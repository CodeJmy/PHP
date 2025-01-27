<?php
session_start();
require('db.php');

// Je vérifie que mon formulaire à bien éte soumis 
if(isset($_POST['submit'])){
    // Je vérifie que mes champs ont bien été remplis
    if(!empty($_POST['email']) && !empty($_POST['motdepasse'])){
        // Je sécurise avec strip_tags
        $email = strip_tags($_POST['email']);
        $mdp = strip_tags($_POST['motdepasse']);
        // Je prépare ma requête SQL
        $sql = 'SELECT email, nom, prenom, password
                FROM users
                WHERE (email = :email)';
        $req = $dbh->prepare($sql);
        $req->bindParam(':email', $email, PDO::PARAM_STR);
        // Je vais exécuter ma requête
        if($req->execute()){
            // Je compte le nombre de lignes
            $nbResultat = $req->rowCount();
            // Si j'ai au moins un resultat
            if($nbResultat > 0){
                // J'enregistre dans la variable $resultat
                $resultat = $req->fetch(PDO::FETCH_ASSOC);
                // Je vérifie si le mot de passe est bon
                if(password_verify($mdp, $resultat['password'])){
                    setcookie('userMail', $resultat['email'], time()+7200);
                    setcookie('userNom', $resultat['nom'], time()+7200);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                    setcookie('userPrenom', $resultat['prenom'], time()+7200);
                    setcookie('userMdp', $resultat['password'], time()+7200);
                    // Je génère un token
                    $token = genererToken();
                    // Je redirige vers la page membre.php
                    header('location:http://coursphp/ExoPhpMailer/membre.php');
                } else {
                    echo 'mauvais mdp';
                }
            } else {
                echo 'Aucun résultats';
            }
        } else {
            echo 'Requête non exécutée !';
        }
    } else {
        echo 'Mauvais mail ou mot de passe !';
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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form action="" method="POST" name="login">
        <div>
            <label for="email">Email :</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="motdepasse">Mot de passe :</label>
            <input type="password" name="motdepasse">
        </div>
        <button type="submit" name="submit">Connexion</button>
    </form>
</body>
</html>