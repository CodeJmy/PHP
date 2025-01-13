<?php
//Liste des extensions autorisé
$extension = ['.jpg','.png','.pdf','.JPG','.PDF','.PNG'];

// Si le formulaire est soumis
if(isset($_POST['submit']))
{
    // Si le fichier a bien été uploadé
    if(is_uploaded_file($_FILES['fichier']['tmp_name']))
    {
        // Récupération de l'extension du fichier en utilisant strrchr()
        $verif_ext = strrchr($_FILES['fichier']['name'],'.');
        // Si l'extension est dans la liste des extensions autorisés
        if(in_array($verif_ext,$extension))
        {
            // Pour renommer le fichier envoyé à la volée
            $nouveau_nom = uniqid().$verif_ext;
            // Déplacement du fichier temporaire vers le dossier de destination finale
            if(move_uploaded_file($_FILES['fichier']['tmp_name'],'upload/'.$nouveau_nom))
            {
                // Je redirige l'utilisateur vers le fichier envoyé
                header('location:upload/'.$nouveau_nom);
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
    <title>Envoi de fichier</title>
</head>
<body>
    <h1> Envoyer un fichier</h1>
    <form method="POST" action="" enctype="multipart/form-data">
        <div>
            <label for="fichier">Choisir un fichier</label>
            <input type="file" name="fichier">
        </div>
        <button type="submit" name="submit">Envoyer</button>
    </form>
</body>
</html>

