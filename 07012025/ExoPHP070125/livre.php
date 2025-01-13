<?php
$livre = [
    'titre' => 1984,
    'auteur' => 'George Orwell',
    'année de publication' => 1949,
    'Genre' => 'Dystopie'
];
//Accédez directement à chaque clé du tableau et affichez ses valeurs (sans boucle).
var_dump($livre);

//Affichez les valeurs de livre.
 echo '<br>'.$livre['titre'];
 echo '<br>'.$livre['auteur'];
 echo '<br>'.$livre['année de publication'];
 echo '<br>'.$livre['Genre'];
 echo '<br>' ;

//Formatez les informations sous forme de texte comme suit :
//"Le livre '1984' écrit par George Orwell appartient au genre Dystopie et a été publié en 1949."
echo 'Le livre '.$livre['titre'].' écrit par '.$livre['auteur'].' appartient au genre '.$livre['Genre'].' et a été publié en '.$livre['année de publication'];
?>
