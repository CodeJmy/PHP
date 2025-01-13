<?php
// C'est le fichier d'entrée
// Il va diriger vers les différentes views
// Les routes vont être gérer avec un switch Case
if(!empty($_GET['route']))
{
    // Si route n'est pas vide je l'enregistre dans la variable route
    $route = $_GET['route'];
}
else
{
    // Sinon la variable route vaut null
    $route = null;
}

switch($route)
{
    //Pour la vue inscription
    case 'inscription':
        // J'instancie le titre de la page
        $titrepage = 'Inscription'; // Je défini le titre du site
        //Je charge le modèle et le controller
        require_once('models/inscription.php');
        require_once('controllers/inscription.php');
        //Je charge le template
        $template = file_get_contents('views/inscription.html'); // Je charge la vue
        //Je vais remplacer ma variable {ERREUR} par la variable $message
        $template = str_replace('{ERREUR}', $message, $template);

    break;

    //Pour la vue login
    case 'login':

    break;
    // Pour la vue espace membre
    
    case 'membres':

    break;
    // La vue par defaut(page index)
    default:
    $titrepage = 'Accueil'; // Je défini le titre du site
    $template = file_get_contents('views/index.html');
    break;
}
include('views/header.php');// Pour afficher le header du site
echo $template; // Pour afficher le contenue du site
include('views/footer.php');// Pour afficher la vue du footer du site

?>

