<?php
// Connexion à la BDD (voir php.net/manuel/fr/pdo.construct.php)
$dsn = 'mysql:dbname=courspdo;host=localhost';
$user = 'root';
$password = '';

$dbh = new PDO($dsn, $user, $password);
// Je vais regarder si j'ai une recherche en cours en GET
if(isset($_GET['recherche'])) 
{
    // Je vérifie avec emptyy si il y a bien un terme de recherche
    if(!empty($_GET['recherche']))
    {
        // Je vais sécurisé le terme recherché avec strip_tags.
        // Cette fonction va enlever tout le code (html, css, javascript, php, etc)
        $recherche = strip_tags($_GET['recherche']);
        // On vas préparer notre requête SQL
        $sql = 'SELECT * FROM utilisateurs WHERE 
        (Nom LIKE :recherche) OR
        (Prenom LIKE :recherche) OR
        (Email LIKE :recherche)
        ';
        // Je prépare ma requête SQL
        $req = $dbh->prepare($sql);
        // J'ajoute les % à ma recherche
        $recherche = '%'.$recherche.'%';
        // Je sécurise avec bindParam et je fais passer mon paramètre recherche avec une valeur un alias et un type
        $req->bindParam(':recherche',$recherche,PDO::PARAM_STR);
        // Je vais executer ma requête SQL
        if($req->execute())
        {
            // Avec rowCount() je vais compter le nombre de résultat
            $nb_resultat = $req->rowCount();
            // Je vérifie si j'ai au moins un resultat supérieur à 0
            if($nb_resultat > 0)
            {
                // J'enregistre dans la variable $resultat les lignes sous forme de tableau associatif
                $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
                // J'affiche le tableau de résultat
                // var_dump($resultat);
                $html = '<table>';
                $html.= '<thead>';
                $html.= '<tr>';
                $html.= '<th>Nom</th>';
                $html.= '<th>Prenom</th>';
                $html.= '<th>Email</th>';
                $html.= '<th>Action</th>';
                $html.= '</tr>';
                $html.= '</thead>';
                $html.= '<tbody>';
                // Je fais ma boucle pour afficher les utilisateurs
                foreach($resultat as $result)
                {
                    $html.= '<tr>';
                    $html.= '<td>'.$result['Nom'].'</td>';
                    $html.= '<td>'.$result['Prenom'].'</td>';
                    $html.= '<td>'.$result['Email'].'</td>';
                    // J'ajoute un lien pour supprimer une ligne 
                    $html.= '<td>
                    <a href="delete.php?id='.$result['ID'].
                    '">Supprimer</a>
                    </td>';
                    $html.= '</tr>';
                }
                // Je ferme mon tableau
                $html.= '</tbody>';
                $html.= '</table>';
            }
        } 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher un membre</title>
</head>
<body>
    <h1>Rechercher un utilisateur</h1>
    <form action="" method="GET" name="php">
        <div>
            <label for="recherche">Recherchez un utilisateur:</label>
            <input type="text" name="recherche">
        </div>
        <button type="submit" name="submit">Rechercher</button>
    </form> 
    <?php
    if(isset($html))
    {
        echo $html;
    }
    ?>    
</body>
</html>