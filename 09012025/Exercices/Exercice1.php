<?php
// Définition d'une fonction nommée 'remplacerCaracteresSpeciaux' qui prend un paramètre '$texte'.
function remplacerCaracteresSpeciaux($texte) {
    // Déclaration d'un tableau contenant des caractères spéciaux ou des symboles à remplacer.
    $caracteres = [
       'à', 'â', 
       'ä', 'é', 
       'è', 'ê', 
       'ë', 'î',
       'ï', 'ô', 
       'ö', 'ù', 
       'û', 'ü', 
       'ç', ' '
    ];
 
    // Déclaration d'un tableau contenant les valeurs de remplacement correspondantes
    $remplacements = [
       'a', 'a', 
       'a', 'e', 
       'e', 'e', 
       'e', 'i', 
       'i', 'o', 
       'o', 'u', 
       'u', 'u', 
       'c', '-'
    ];
 
    // Utilisation de la fonction str_replace() pour remplacer les caractères définis dans $caracteres par ceux dans $remplacements.
    $texte = str_replace($caracteres, $remplacements, $texte);
 
    // Retourne le texte modifié après remplacement.
    return $texte;
 }
 
 // Définition d'une chaîne contenant des caractères spéciaux.
 $texte = "& ( ) _";
 
 // Appel de la fonction avec le texte défini juste au dessus
 echo remplacerCaracteresSpeciaux($texte);
?>