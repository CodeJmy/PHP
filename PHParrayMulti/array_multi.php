<?php
$array_multi = [
    ['Stéphane','Carpentier'],
    ['Imane','Amri'],
    ['Tristan','Deschamps']
];
var_dump($array_multi);

// Pour affiche le nom complet
 echo $array_multi[1][0].' '.$array_multi[1][1];

 // Tableau avec clé valeur
 $array_key = [
    'producteur' => ['nom' => 'Ottrillaut', 'prenom' => 'Pascal'],
    'acteur' => ['prenom' => 'Tonio', 'age' => 30],
    'actrice' => ['prenom' => 'Kenza', 'ville' => 'Bourges']
 ];
 var_dump($array_key);
 echo $array_key['acteur']['prenom'].' à '.$array_key['acteur']['age'];

?>

