<?php
// j'ouvre un fichier nommé monfichier.txt en mode écriture avec w
$fichier = fopen('monfichier.txt','w');

// j'écris dans le fichier
 fwrite($fichier, 'Hello World !');
 // Je ferme le fichier
 fclose($fichier);
 echo 'Fichier créé et écrit';
 echo '<br>';
// Je vais ouvrir ce fichier
$lire = file_get_contents('monfichier.txt');
// J'affiche le contenu du fichier
echo $lire;

$tristan = file_get_contents('tristan.txt');
echo $tristan;

$cci = file_get_contents('http://www.cher.cci.fr/');
$fichier2 = fopen('cci.html','w');
fwrite($fichier2,$cci);
fclose($fichier2);
echo $cci;
// Pour creer un dossier je fais appel a mkdir
mkdir('mondossier');
// Pour supprimer un dossier je fais appel a rmdir : rmdir('mondossier');

?>