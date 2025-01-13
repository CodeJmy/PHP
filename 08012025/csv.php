<?php
// Créer un fichier csv en php
$file = fopen('tableau.csv','w');
//création d'un tableau multidimensionnel qui vas former chaque ligne de mon CSV
$clients = [
    ['Carpentier','Stéphane'],
    ['Deschamp','Tristan']
];

// Je boucle sur mon tableau
foreach ($clients as $client) 
{
    // Je convertis la ligne en chaine de caractère séparé par une virgule
    fputcsv($file, $client,';');
}
// Fermeture du fichier
fclose($file);
echo 'Le fichier CSV a été créé avec succès.';

?>