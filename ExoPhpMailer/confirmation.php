<?php
session_start();
require('db.php');

// Je vérifie que mon formulaire à bien été soumis
if(isset($_POST['submit']))
{
    // Je vérifie que mon formulaire à bien été remplis
    if(!empty($_POST['password']) && !empty($_POST['confPassword']))
    {
        // Je sécurise avec strip_tags
        $password = strip_tags($_POST['password']);
        $confPassword = strip_tags($_POST['confPassword']);
        // Je vérifie si les mots de passe sont identiques
        if($_POST['password'] === $_POST['confPassword']){
            // Je prépare ma requête SQL UPDATE
            $sql = $dbh->prepare('UPDATE users
            SET users.password = :password
            WHERE users.email = :email');
            // Je fais passer mes paramètres
            $sql->bindValue(':password', password_hash($password, PASSWORD_BCRYPT), PDO::PARAM_STR);
            $sql->bindValue(':email', $_POST['email'], PDO::PARAM_INT);
            // Si la requête se passe bien
            if($sql->execute()){
            echo 'Mot de passe bien modifié';
            header('location:http://coursphp/ExoPhpMailer/login.php');
            } else {
                echo 'Apprends à coder connard !! (bis)';
            }
        } else {
            echo 'Mauvais mot de passe!!';
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Définir le mot de passe</title>
</head>
<body>
    <h1>Définir le mot de passe</h1>
    
    <form action="" method="POST">
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="password">Nouveau mot de passe:</label>
            <input type="password" name="password">
        </div>
        <div>
            <label for="confPassword">Confirmer le mot de passe:</label>
            <input type="password" name="confPassword"> 
        </div>
        <button type="submit" name="submit">Confirmer</button>
    </form> 
</body>
</html>




