<?php
session_start();
require('db.php');
echo $_COOKIE['userNom'].'<br>';
echo $_COOKIE['userPrenom'].'<br>';
echo $_COOKIE['userMail'].'<br>';
echo $_COOKIE['userMdp'].'<br>';
echo $_COOKIE['userId'];

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

if(isset($_POST['submit'])){
    // Je prépare ma requête SQL
    $sql = 'SELECT * FROM utilisateurs';
    $req = $dbh->prepare($sql);
    // Je vais exécuter ma requête
    if($req->execute()){
        // Je compte le nombre de résultats
        $nb_resultat = $req->rowCount();
        // Je vérifie si j'ai au moins 1 résultat
        if($nb_resultat > 0){
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
            // J'affiche le tableau de résultat
            $html = '<table>';
            $html.= '<thead>';
            $html.= '<tr>';
            $html.= '<th>Nom</th>';
            $html.= '<th>Prénom</th>';
            $html.= '<th>Email</th>';
            $html.= '<th>Mot de passe</th>';
            $html.= '<th>Actif</th>';
            $html.= '<th>Niveau</th>';
            $html.= '</tr>';
            $html.= '</thead>';
            $html.= '<tbody>';
            // Je boucle pour afficher les infos des utilisateurs
            foreach($resultat as $result){
                $html.='<tr>';
                $html.='<td>'.$result['nom_utilisateur'].'</td>';
                $html.='<td>'.$result['prenom_utilisateur'].'</td>';
                $html.='<td>'.$result['email_utilisateur'].'</td>';
                $html.='<td>'.$result['motdepasse_utilisateur'].'</td>';
                $html.='<td>'.$result['actif_utilisateur'].'</td>';
                $html.='<td>'.$result['niveau_utilisateur'].'</td>';
                // J'ajoute un lien pour supprimer une ligne
                $html.= '<td>
                            <a href="supprimer.php?id='.$result['id_utillisateur'].'&token='.$token.'">Supprimer</a>
                        </td>';
                // J'ajoute un lien pour modifier une ligne
                $html.= '<td>
                            <a href="editer.php?id='.$result['id_utillisateur'].'&token='.$token.'">Modifier</a>
                        </td>';
                $html.= '</tr>';
            }
            // Je ferme mon tableau
            $html.= '</tbody>';
            $html.= '</table>';
        }
    }
}
// Afficher un message si utilisateur bien supprimer
// Je vérifie que j'ai bien 'message=deleteOk' en GET
if(isset($_GET['message']) && $_GET['message'] == 'deleteOk'){
    echo '<br>Utilisateur supprimé';
}
// Afficher un message si utilisateur bien modifier
// Je vérifie que j'ai bien 'message=modifOk'en GET
if(isset($_GET['message']) && $_GET['message'] == 'modifOk'){
    echo '<br>Utilisateur bien modifié';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membre</title>
</head>
<body>
    <h1>T'est un génie frero</h1>
    <form action="" method="POST">
        <button type="submit" name="submit">Afficher info utilisateurs</button>
    </form>
    <?php
    if(isset($html)){
        echo $html;
    }
    ?>
</body>
</html>