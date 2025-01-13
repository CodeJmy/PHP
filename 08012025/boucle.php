<?php
// Boucle for en PHP
for ($i = 0; $i < 5; $i++) 
{
    echo $i;
}
//------------------------------------------------------------------------------------------------------------------------------------
// Boucle for avec un tableau en PHP
$tableau = ['Tanguy','Ilan','Imane','Tristan','Jimmy','Nicolas','Romain','Hugo','Stéphane'];
echo 'nb element: '.count($tableau);
// Je vais parcourir le tableau à l'aide d'une boucle for
for($i=0;$i < count($tableau); $i++)
{
    echo $tableau[$i].'<br>';
}

//------------------------------------------------------------------------------------------------------------------------------------

//La boucle while
// j'initialise i à 0;
$i=0;
// Tant que i est inférieur à count de tableau alors j'itère la boucle
while ($i < count($tableau))
{
    // J'affiche l'élément du tableau
    echo $tableau[$i].'<br>';
    $i++; // j'incrémente i à chaque itération de la boucle , si je n'incrémente pas i je vais faire une boucle infini
}

//------------------------------------------------------------------------------------------------------------------------------------

// La boucle do...while
$i=0;
do {
    // J'affiche l'élément du tableau
    echo $tableau[$i].'<br>';
    $i++; // j'incrémente i à chaque itération de la boucle
} while ($i < count($tableau)); // Je boucle tant que j'ai des éléments du tableau

//------------------------------------------------------------------------------------------------------------------------------------
// Boucle foreach

foreach($tableau as $prenom)
{
    echo $prenom.'<br>';
}

// tableau associatifs

$tableau_associatifs = [
    'prenom' => 'Tanguy',
    'nom' => 'Siri',
    'profession' => 'développeur débutant',
    'passion' => 'Les BMC',
];

// Boucle foreach avec clé et valeur
foreach($tableau_associatifs as $key => $value)
    {
        echo $key.' : '.$value.'<br>';
    }
// tableau imbriqué
$imbrique = [
    'personne1' => ['nom' => 'Siri','prenom' => 'Tanguy'],
    'personne2' => ['nom' => 'Carpentier','prenom' => 'Stéphane'],
    'personne3' => ['nom' => 'Deschamp','prenom' => 'Tristan'],
    'personne4' => ['nom' => 'Amri','prenom' => 'Imane']
];

// Boucle foreach avec imbrication
foreach($imbrique as $key => $value)
{
    //key vaut personne1,personne2...
    //value vaut le tableau de chaque ligne
    // Je parcours le tableau dans le tableau
    foreach($value as $cle => $valeur)
    {
        // cle vaut nom, prenom...
        //valeur vaut le onm de famille et le prenom
        echo $cle.' : '.$valeur.'<br>';
    }
}

?>