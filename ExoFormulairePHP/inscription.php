<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form name="inscription" method="POST" action="">
        <div>
            <label for="username">Username :</label>
            <input type="text" name="username">
        </div>
        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" name="password">
        </div>
        <button type="submit" name="submit">Inscription</button>
    </form>
</body>
</html>

<?php
session_start(); // J'utilise session_start pour utiliser 
if(isset($_POST['submit'])){
    $tailleNom = strlen($_POST['username']); 
    $tailleMdp = strlen($_POST['password']);
    if(($tailleNom >= 3) && ($tailleMdp >= 6)){ // J'utilise tailleNom et tailleMpd pour donner une taille minimum d'au moins 3 caractères 
        $password_crypt = password_hash($_POST['password'], PASSWORD_DEFAULT); // Je hashe le mot de passe avec la fonction password_hash 
        $_SESSION['utilisateur'] = $_POST['username']; // Création d'une session utilisateur
        setcookie('password', $password_crypt, (time()+3600));// Création d'un cookie pour mémoriser le nom d'utilisateur
 
    } else if(($tailleNom < 3) && ($tailleMdp >= 6)){ // condition message si prenom trop petit
        echo 'Prenom trop petit !';
    } else if (($tailleNom >= 3) && ($tailleMdp < 6)){ // condition message si mot de passe trop petit
        echo 'Mot de passe trop petit !';
    } else {
        echo 'Prenom et mot de passe trop petit !'; // condition message si prenom et mot de passe sont trop petit
    }
}
?>