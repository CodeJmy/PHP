<?php
//Vérifiez si un fichier a été envoyé ($_FILES)

if(isset($_FILES['submit']))
var_dump($_FILES);
{
    // // Si le fichier a bien été uploadé
    if(is_uploaded_file($_FILES['fichier']['tmp_name']))
    {
        echo $_FILES['fichier']['name'].'<br>';
        echo $_FILES['fichier']['tmp_name'].'<br>';
        echo $_FILES['fichier']['size'].'<br>';
        echo $_FILES['fichier']['type'].'<br>';

        // Vérifiez si le type du fichier est une image JPEG (.JPEG)
        $verif_ext = strrchr($_FILES['fichier']['type'],'.JPEG');
        if($verif_ext == '.JPEG')
        {
            echo 'Le fichier est au format JPEG';
        }
        else {
            echo 'Le fichier n\'est pas au format JPEG';
            echo '<br>';
        }
        // Pour renommer le fichier envoyé à la volée
        $nouveau_nom = uniqid().$verif_ext;
        // Déplacement du fichier temporaire vers le dossier de destination finale
        if(move_uploaded_file($_FILES['fichier']['tmp_name'],'upload/'.$nouveau_nom))
        {
            // Vérifiez que le fichier envoyé par le formulaire ne dépasse pas 1 Mo ($_FILES['file']['size']).
            if($_FILES['fichier']['size'] > 1000000)
            {
                echo 'Le fichier dépasse les 1Mo';
            }
            else
            {
                echo 'Le fichier ne dépasse pas les 1Mo, Tout est ok';
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
    <title>Document</title>
</head>
<body>
    <h1> Envoyer un fichier</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <label for="fichier">Choisir un fichier:</label>
            <input type="file" name="fichier">
        </div>
        <button type="submit" name="submit">Envoyer</button>
    </form>   
</body>
</html>
