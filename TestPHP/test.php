<?php
function uploadFichier($fichier, $destination) {
    // Vérifier la taille du fichier (10 Mo maximum)
    if ($fichier['size'] > 10485760) {
        throw new Exception("Le fichier dépasse la taille maximale de 10 Mo.");
    }

    // Vérifier les extensions interdites (.php et .js)
    $extension = pathinfo($fichier['name'], PATHINFO_EXTENSION);
    if (in_array($extension, ['php', 'js'])) {
        throw new Exception("Les fichiers avec l'extension .php ou .js ne sont pas autorisés.");
    }

    // Renommer le fichier de manière aléatoire
    $nouveauNom = uniqid() . '.' . $extension;

    // Chemin complet vers le répertoire de destination
    $cheminDestination = rtrim($destination, '/') . '/' . $nouveauNom;

    // Déplacer le fichier vers le répertoire de destination
    if (!move_uploaded_file($fichier['tmp_name'], $cheminDestination)) {
        throw new Exception("Erreur lors de l'upload du fichier.");
    }

    // Stocker les informations du fichier dans une session
    session_start();
    $_SESSION['file_info'] = [
        'original_name' => $fichier['name'],
        'new_name' => $nouveauNom,
        'size' => $fichier['size'],
        'type' => $fichier['type'],
        'destination' => $cheminDestination,
    ];

    return $_SESSION['file_info'];
}
?>