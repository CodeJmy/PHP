<?php
// Je vais traiter le formulaire d'inscription
if(isset($_POST['submit']))
{
    // Je vérifie si les champs sont remplis
    if(!empty($_POST['email']) &&!empty($_POST['password']) &&!empty($_POST['password2']))
    {
        // Je vérifie si les mots de passe sont identiques
        if($_POST['password'] === $_POST['password2'])
        {
            // on vas hasher le mot de passe
            $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
            // Je fais appel au modèle pour créer l'utilisateur
            if(creerUtilisateur($_POST['email'],$password))
            {
                // Je redirige l'utilisateur vers la page connection
                header('location:index.php?route=login');
                exit;// Je quitte le script
            }
            else
            {
                // Si le modèle n'a pas pu créer d'utilisateur
                $message = 'ERREUR';
            }
        }
        else
        {
            // Si les mots de passe ne sont pas identiques
            $message = 'Veuillez mettre 2 mot de passe identique';
        }
    }
    else
    {
        // Si les champs ne sont pas remplis
        $message = 'Veuillez remplir tous les champs';
    }
}
else
{
    $message = '';
}
?>