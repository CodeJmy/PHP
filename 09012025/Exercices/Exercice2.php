<?php
// Fonction multiplication
function multiplication($nombre)
{
    // Boucle pour afficher la table de multiplication de $nombre entre 1 et 10
    for($i=1;$i<=10;$i++)
    {
        // Affichage de la multiplication
        echo $i .'x'.$nombre.'='.($i*$nombre).'<br>';
    }
}
// Appel de la fonction 

multiplication(5); // multiplication par 5
?>
