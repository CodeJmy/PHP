<?php
$tableau = [
    [
        'personne1' => ['nom' => 'Bru', 'Prénom' => 'Thierry','age' => 39],
        'personne2' => ['nom' => 'Dupont', 'Prénom' => 'Juliette','age' => 35],
        'personne3' => ['nom' => 'Chirac','Prénom' => 'Patrick', 'age' => 45]
    ]
];

// A l'aide des boucles parcourir le tableau multi dimension et afficher l'ensemble des informations.

foreach ($tableau[0] as $personne) {
    foreach ($personne as $key => $value) {
        echo $key.': '. $value.'<br>';
    }
    echo '<br>';
}

// Filtrer les personnes qui ont moins de 40 ans

// Avec la fonction array_filter()
$filter = array_filter($tableau[0],function($personne){
    return $personne['age'] > 40;
});
foreach ($filter as $personne => $value) 
{
    echo $personne.'='.$value['nom'].''.$value['age']."<br>";
}


// foreach ($tableau[0] as $personne) {
//     if ($personne['age'] < 40) {
//         echo 'Prénom: '. $personne['Prénom'].' Nom: '. $personne['nom'].'<br>';
//     }
// }
?>
