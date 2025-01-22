<?php
// Connexion à la BDD (voir php.net/manuel/fr/pdo.construct.php)
$dsn = 'mysql:dbname=courspdo;host=localhost';
$user = 'root';
$password = '';

$dbh = new PDO($dsn, $user, $password);
// Je vais préparer une requête SQL d'insertion
$requete = $dbh->prepare('INSERT INTO utilisateurs (Nom,Prenom,Email,Motdepasse,DateNaissance) VALUES (:nom,:prenom,:email,:motdepasse,:datenaissance)');
// Je vais attribuer mes valeurs a ma requête
$requete->bindValue(':nom',$_POST['nom'],PDO::PARAM_STR);
$requete->bindValue(':prenom',$_POST['prenom'],PDO::PARAM_STR);
$requete->bindValue(':email',$_POST['email'],PDO::PARAM_STR);
$requete->bindValue(':motdepasse',$_POST['motdepasse'],PDO::PARAM_STR);
$requete->bindValue(':datenaissance',$_POST['datenaissance'],PDO::PARAM_STR);
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