<?php
session_start();
require('db.php');

// Je récupère mon token
if(isset($_GET['token']) && !empty($_GET['token'])){
    $token = $_GET['token'];
}
// Function pour vérifier le token
function verifierToken($cle){
    // Je vérifie que le token est correct
    if($_SESSION['token'] == $cle){
        return true;
    } else {
        return false;
    }
}
// Je vérifie si ma function 'verifierToken' renvoie false
if(verifierToken($token) == false){
    // Je redirige vers la page 'login' 
    header('location:login.html');
    exit;
}

// Je vérifie que mon formulaire à bien été soumis
if(isset($_POST['submit'])){
    // Je vérifie que mon formulaire à bien été remplis
    if(!empty($_POST['password']) && !empty($_POST['newPassword'])){
        // Je sécurise avec strip_tags
        $password = strip_tags($_POST['password']);
        $newPassword = strip_tags($_POST['newPassword']);
        // Je prépare ma requête SQL SELECT
        $sqlMdp = ('SELECT motdepasse_utilisateur
                    FROM utilisateurs
                    WHERE id_utillisateur = :id');
        $req = $dbh->prepare($sqlMdp);
        // Je fais passer mon paramètre
        $req->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
        if($req->execute()){
            // Je compte le nombre de lignes
            $nbResultat = $req->rowCount();
            // Si j'ai au moins 1 résultat
            if($nbResultat > 0){
                // J'enregistre dans la variable $resultat
                $resultat = $req->fetch(PDO::FETCH_ASSOC);
                // Je vérifie si le mot de passe est bon
                if(password_verify($password, $resultat['motdepasse_utilisateur'])){
                    // Je prépare ma requête SQL UPDATE
                    $sql = $dbh->prepare('UPDATE utilisateurs
                            SET utilisateurs.motdepasse_utilisateur = :newMdp
                            WHERE utilisateurs.id_utillisateur = :id');
                    // Je fais passer mes paramètres
                    $sql->bindValue(':newMdp', password_hash($newPassword, PASSWORD_BCRYPT), PDO::PARAM_STR);
                    $sql->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
                    // Si la requête se passe bien
                    if($sql->execute()){
                        echo 'Mot de passe bien modifié';
                        // header('location:membres?token='.$_SESSION['token'].'&message=modifOk');
                    } else {
                        echo 'Apprends à coder connard !! (bis)';
                    }
                } else {
                    echo 'Mauvais mot de passe !!';
                }
            } else {
                echo 'Aucun utilisateur trouvé !!';
            }
        } else {
            echo 'Apprends à coder connard !!';
        }
    } else {
        echo 'Remplis tout les champ du formulaire enculler !!';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer</title>
</head>
<body>
    <h1>Editer utilisateur</h1>
    <h2>Changer mot de passe</h2>
    <form action="" method="POST">
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password">
        </div>
        <div>
            <label for="newPassword">Nouveau mot de passe :</label>
            <input type="password" name="newPassword">
        </div>
        <button type="submit" name="submit">Changer</button>
    </form>
</body>
</html>