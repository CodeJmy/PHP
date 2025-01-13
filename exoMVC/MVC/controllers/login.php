<?php
// Je vérifie si les champs ont été remplis
if(isset($_POST['submit2']))
  {
    if(!empty($_POST['email']) && !empty($_POST['password']))
    {
        if(verifierMembres($_POST['email'], $_POST['password']) == true)
        {
            genererToken();
            // Je redirige vers la page membres
            header('location:index.php?route=membres');
        }
        else
        {
            $message = "Email ou Mot de passe incorrect, Veuillez recommencer";
        }
    }
    else
    {
    $message = "Veuillez remplir tout les champs";
    }
}    
else
{
$message = '';
}

?>
