<?php
// Si le formulaire est soumis
if (isset($_POST['submit'])) {
 // Si il y a bel et bien des fichiers
 if (isset($_FILES['fichier'])) {
  $fichiers = $_FILES['fichier'];

  // Vérification individuelle pour chaque fichier
  if (count($fichiers['name']) === 3 && !empty($fichiers['name'][0]) && !empty($fichiers['name'][1]) && !empty($fichiers['name'][2])) {
   // Vérification avec is_uploaded_file
   if (is_uploaded_file($fichiers['tmp_name'][0]) && is_uploaded_file($fichiers['tmp_name'][1]) && is_uploaded_file($fichiers['tmp_name'][2])) {

    // Affichage des informations des fichiers
    // J'utilise htmlspecialchars par habitude. Pour sécuriser
    echo "<p>Fichier 1 : " . htmlspecialchars($fichiers['name'][0]) . "<br>";
    echo "Taille : " . htmlspecialchars($fichiers['size'][0]) . " octets</p>";

    echo "<p>Fichier 2 : " . htmlspecialchars($fichiers['name'][1]) . "<br>";
    echo "Taille : " . htmlspecialchars($fichiers['size'][1]) . " octets</p>";

    echo "<p>Fichier 3 : " . htmlspecialchars($fichiers['name'][2]) . "<br>";
    echo "Taille : " . htmlspecialchars($fichiers['size'][2]) . " octets</p>";

   } else {
    echo "<p>Erreur : Un ou plusieurs fichiers n'ont pas été correctement téléchargés.</p>";
   }
  } else {
   echo "<p>Erreur : Vous devez envoyer exactement trois fichiers non vides.</p>";
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

