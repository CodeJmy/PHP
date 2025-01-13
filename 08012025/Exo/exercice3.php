<?php
//A l'aide d'une boucle while
// Effectuer un compte à rebours de 30 à 0 

$compteur = 31;
// Boucle while
while($compteur > 0)
{
    $compteur--; // decrement compteur
    echo $compteur.'<br>'; // affichage du compteur
    //affiche un message à la fin du compte à rebours
    if($compteur == 0)
    {
        echo ' Décolage !';
    }
}
?>