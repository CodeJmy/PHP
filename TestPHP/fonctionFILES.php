<?php
function uploadFichier($fichier,$destination)
{
    // Vérifier que le fichier n'a pas les extensions .php ou .js
    $extensions = array('.js','JS', '.php','PHP');
    for($i=0;$i<count($fichier['name']);$i++)
    {
        if(is_uploaded_file($fichier['tmp_name'][$i]))
        {
            $ext = strrchr($fichier['name'][$i], '.');
            if(!in_array($ext, $extensions) && $fichier['size'][$i] <= 10485760)
            {
                if (!is_dir($destination))
                {
                    mkdir($destination); 
                }  
            // renommer le fichier aléatoirement
            $fichier['name'][$i] = uniqid().$ext;
            // Envoyer le fichier vers le repertoire de destination
            move_uploaded_file($fichier['tmp_name'][$i],'upload/'.$fichier['name'][$i]);
            echo 'fichier envoyer';
            } else {
                echo 'Erreur :'.$fichier['name'][$i].'trop volumineux <br>';
            }
        }else {
            echo "Aucun fichier choisi <br>";
        }
    } 
}

// utilisation de la fonction
if(isset($_POST['submit']))
{
    uploadFichier($_FILES['fichier'], 'upload');
}

// Retourner les infos du fichier dans une session
    if(!empty($_SESSION['fichier']))
    {
        foreach($_SESSION['fichier'] as $fichier)
        {
            echo 'Nom : '.$fichier['name'].'<br>';
            echo 'Taille : '.$fichier['size'].' octets<br>';
            echo 'Type : '.$fichier['type'].'<br>';
            echo 'Chemin : '.$fichier['tmp_name'].'<br>';
            echo '<hr>';
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
            <input type="file" name="fichier[]">
        </div>
        <div>
            <label for="fichier">Choisir un fichier:</label>
            <input type="file" name="fichier[]">
        </div>
        <div>
            <label for="fichier">Choisir un fichier:</label>
            <input type="file" name="fichier[]">
        </div>
        <div>
            <label for="fichier">Choisir un fichier:</label>
            <input type="file" name="fichier[]">
        </div>
        <div>
            <label for="fichier">Choisir un fichier:</label>
            <input type="file" name="fichier[]">
        </div>
        <button type="submit" name="submit">Envoyer</button>
    </form>   
</body>
</html>