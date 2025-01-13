<?php
require_once('function.php');
$password1 = genererMotDePasse();
echo 'mot de passe aléatoire: ' .$password1;
echo '<br>';
$password2 = genererMotDePasse([
    'longueur' => 40,
    'speciaux' =>8,
    'maj'=> 8,
    'chiffres' => 5,
    'thierry' => null
]);
echo 'mot de passe aléatoire 2 : ' .$password2;
?>