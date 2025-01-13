<?php
// tableau avec la fonction array
$tableau = array('Hugo','Stéphane','Didier');

// utilisation de la fonction array_search pour chercher un élément dans un tableau
$cle = array_search('Hugo',$tableau);
echo ' La clé est : '.$cle;

// tableau avec les crochets
$tableau2 = ['Damien','Tanguy','Nicolas'];

// Pour afficher le tableau
var_dump($tableau);

// Je trie le tableau par ordre alphabétique (fonction sort)
sort($tableau);

// Afficher le tableau trié

echo 'Tableau trié : <br>';
var_dump($tableau);

// Je merge les 2 tableaux
$tableau3 = array_merge($tableau,$tableau2);

// Afficher le tableau fusionné

echo 'Tableau fusionné : <br>';
var_dump($tableau3);

// Je supprime l'entrée 'Damien' du tableau

unset($tableau3[3]);

// Afficher le tableau sans Damien
echo 'Le tableau sans Damien';
var_dump($tableau3);

// Afficher le contenu du tableau avec array avec une boucle

echo 'Contenu du tableau avec array : <br>';
foreach($tableau as $value)
{
    echo '<br>' .$value;
};

// Afficher le contenu du tableau avec les crochets

$personne = [
    'nom' => 'Carpentier',
    'prenom' => 'Stéphane',
    'entreprise' => 'Bouygues Telecom',
];
// J'affiche le tableau clé valeur
var_dump($personne);

// J'affiche l'entreprise de personne
echo $personne['entreprise'];

