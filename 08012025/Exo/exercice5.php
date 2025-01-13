<?php
if(isset($_POST['submit']))
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];

    // écriture dans le fichier
    $fichier = fopen('contact.csv','a+');
    $remplissage = [$fichier,$nom,$prenom,$email,$sujet,$message];
    fputcsv($fichier,$remplissage,';');
    fclose($fichier);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulaire de Contact</h1>
    <form name="contact" method="POST" action="exercice5">
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
            <label for ="sujet">Sujet:</label>
            <input type="text" name="sujet">
        <div>
            <label for="message">Message:</label>
            <textarea name="message" rows="5" cols="30"></textarea>
        </div>
        <button type="submit" name="submit">Envoyer</button>
</body>
</html>