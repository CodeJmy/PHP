<?php
// Connexion à la BDD (voir php.net/manuel/fr/pdo.construct.php)
$dsn = 'mysql:dbname=exopdo;host=localhost';
$user = 'root';
$password = '';

$dbh = new PDO($dsn, $user, $password);
// Je vais préparer une requête SQL d'insertion
$requete = $dbh->prepare('INSERT INTO utilisateurs (nom_utilisateur,prenom_utilisateur,email_utilisateur,motdepasse_utilisateur,actif_utilisateur,niveau_utilisateur) VALUES (:nom,:prenom,:email,:motdepasse,:actif,:niveau)');
// Je vais attribuer mes valeurs a ma requête
$requete->bindValue(':nom',$_POST['nom'],PDO::PARAM_STR);
$requete->bindValue(':prenom',$_POST['prenom'],PDO::PARAM_STR);
$requete->bindValue(':email',$_POST['email'],PDO::PARAM_STR);
// mot de passe avec hashage password_
$requete->bindValue(':motdepasse',password_hash($_POST['motdepasse'], PASSWORD_DEFAULT),PDO::PARAM_STR);
$requete->bindValue(':actif',$_POST['actif'],PDO::PARAM_STR);
$requete->bindValue(':niveau',$_POST['niveau'],PDO::PARAM_STR);

// J'execute ma requête
if($requete->execute())
{
    echo "Utilisateur enregistré";
}
else
{
    echo "Erreur"; 
}
?>