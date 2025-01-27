<?php
session_start();
// Je génère une clé aléatoire
$captcha = substr(str_shuffle('azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN1234567890'), 0,6);
// J'enregistre le captcha dans la session
$_SESSION['captcha'] = $captcha;
// On va définir la largeur et la hauteur de notre image
$width = 150;
$height = 50;
// Je vais créer une nouvelle image
$image = imagecreatetruecolor($width, $height);
// Je vais définir les différentes couleurs
$background = imagecolorallocate($image, 255, 255, 255); // Background white
$text = imagecolorallocate($image, 0, 0, 0); // Color black
$ligneBlue = imagecolorallocate($image, 0, 0, 255); // Ligne blue
$ligneRed = imagecolorallocate($image, 255, 0, 0); // Ligne blue
$ligneGreen = imagecolorallocate($image, 0, 255, 0); // Ligne blue
// Je vais dessiner le background à l'image
imagefilledrectangle($image, 0, 0, $width, $height, $background);
// Je vais déssiner les lignes pour compliquer la lecture du captcha
for($i=0;$i<5;$i++){
    imageline($image, rand(0,$width), rand(0,$height), rand(0,$width), rand(0,$height), $ligneBlue);
    imageline($image, rand(0,$width), rand(0,$height), rand(0,$width), rand(0,$height), $ligneRed);
    imageline($image, rand(0,$width), rand(0,$height), rand(0,$width), rand(0,$height), $ligneGreen);
}
// Je vais dessiner des petits points pour compliquer la lecture du captcha
for($i=0;$i<100;$i++){
    imagesetpixel($image, rand(0, $width), rand(0, $height), $ligneBlue);
}
// Je vais écrire mon captcha dans l'image
// imagestring($image, 5, rand(10,50), rand(10,20), $captcha, $text);
// Captcha ondulé
for($i=0;$i<strlen($captcha); $i++){
    imagestring($image, 5, rand(10*$i,10*$i+1), rand(10,30), $captcha[$i], $text);
}
// J'envoie un header pour indiquer que c'est une image
header('Content-Type: image/png');
// Je génère l'image avec la function imagepng
imagepng($image);
// Une fois l'image générée je la détruit pour éviter une surcharge mémoire
imagedestroy($image);
?>
 