<?php
if (isset($_POST['submit']))
{
    if(!empty($_POST['connaissance']))
    {
    var_dump($_POST['connaissance']);
    } 
}
if (isset($_POST['submit']))
{
    //Afficher le nombre de connaissances cochées
    $connaissances = $_POST['connaissance'];
    echo 'Vous avez coché '.count($connaissances).' connaissances';
    // Afficher les connaissances cochées
    foreach($connaissances as $connaissance)
    {
        echo '<br>'.$connaissance;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Les formulaires et le PHP</h1>
    <form name="formulaire" method="POST" action="traitement.php">
        <div class="form-group">
            <label for="connaissance">Sélectionnez vos connaissances</label>
            <input type="checkbox" name="connaissance[]" value="HTML"><label>HTML</label>
            <input type="checkbox" name="connaissance[]" value="CSS"><label>CSS</label>
            <input type="checkbox" name="connaissance[]" value="Javascript"><label>Javascript</label>
            <input type="checkbox" name="connaissance[]" value="Wordpress"><label>Wordpress</label>
            <input type="checkbox" name="connaissance[]" value="PHP"><label>PHP</label>
            <input type="checkbox" name="connaissance[]" value="Je sais que je ne sais rien"><label>Je sais que je ne sais rien</label>
        </div>
        <button type="submit" name="submit">Envoyer</button>
    </form>
</body>
</html>