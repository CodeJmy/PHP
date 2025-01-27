<?php
require('db.php');

// Je prépare ma requête SQL
$requete = $dbh->prepare('INSERT INTO utilisateurs (nom_utilisateur, prenom_utilisateur, email_utilisateur, motdepasse_utilisateur, actif_utilisateur, niveau_utilisateur) VALUES (:nom, :prenom, :email, :motdepasse, :actif, :niveau)');

if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['motdepasse']) && !empty($_POST['radio']) && !empty($_POST['niveau'])){
    $requete->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $requete->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $requete->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $requete->bindValue(':motdepasse', password_hash($_POST['motdepasse'], PASSWORD_BCRYPT), PDO::PARAM_STR);
    $requete->bindValue(':actif', $_POST['radio'], PDO::PARAM_STR);
    $requete->bindValue(':niveau', $_POST['niveau'],PDO::PARAM_STR);
}

// J'exécute ma requête
if($requete->execute()){
    echo 'utilisateur enregistré !';
    header('location:login.html');
} else {
    echo "T'est null !!";
}
?>