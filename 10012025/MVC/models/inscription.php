<?php
//Fonction pour créer un Utilisateur
function creerUtilisateur($email='', $password='') 
{
    // Je vérifie si email et password ont des valeurs
    if (!empty($email) &&!empty($password)) 
    {
        $fichier = fopen('membres.csv', 'a'); // J'ouvre un fichier membres.csv
        fputcsv($fichier,[$email,$password,';']);// J'écris une ligne dans mon fichier membres.csv
        fclose($fichier); // Je ferme le fichier
        // Je vais stocker dans un cooki les valeurs
        setcookie('membres',serialize(['email' => $email, 'password<' => $password]).(time()+3600));
        return true; // Je retourne pour true
    }
    return false; // Je retourne false si email et password sont vides
}
?>