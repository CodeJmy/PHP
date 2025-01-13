<?php
// Vérifier si le formulaire a été soumis
if (isset($_POST['submit']))
{
    // Vérifier si tous les champs sont remplis
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['age']))
    {
        echo 'Merci de votre inscription, votre compte a été créer avec succès !';
    }
    else
    {
        echo 'Veuillez remplir tous les champs.';
    }
}

// Hasher le mot de passe
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Enregistrer l'ensemble des informations dans un fichier CSV nommé membres.csv
$file = fopen('membres.csv', 'a+');
fputcsv($file, [$_POST['nom'], $_POST['prenom'], $_POST['email'], $password, $_POST['age']]);
fclose($file);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 6</title>
</head>
<body>
    <h1>Formulaire d'inscription</h1>
    <form name="inscription" method="POST" action="exercice6">
        <div>
            <label for="nom">Nom:</label>
            <input type="text" name="nom">
        </div>
        <div>
            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password">
        </div>
         <div>
            <label for="age">Age:</label>
            <input type="number" name="age">
        </div>

        <button type="submit" name="submit">Envoyer</button>
</body>
</html>