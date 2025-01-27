<?php
session_start();
require('db.php');

// Je récupère mon token
if(isset($_GET['token']) && !empty($_GET['token'])){
    $token = $_GET['token'];
}
// Function pour vérifier le token
function verifierToken($cle){
    // Je vérifie que le token est correct
    if($_SESSION['token'] == $cle){
        return true;
    } else {
        return false;
    }
}
// Je vérifie si ma function 'verifierToken' renvoie false
if(verifierToken($token) == false){
    // Je redirige vers la page 'login' 
    header('location:login.html');
    exit;
}

//Verif que l'utilisateur à modifier n'est pas celui connecté
if(isset($_COOKIE['userId']) && !empty($_COOKIE['userId'])){
    if($_COOKIE['userId'] == $_GET['id']){
        $idUser = false;
    } else {
        $idUser = true;
    }
} else {
    $idUser = false;
}


// Je vérifie que $idUser vaut bien 'true'
if($idUser == true){
    // Je vérifie si j'ai bien un ID en GET
    if(isset($_GET['id']) && !empty($_GET['id'])){
        // Je prépare ma requête de suppression
        $del = $dbh->prepare('DELETE FROM utilisateurs WHERE id_utillisateur = :id');
        $del->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
        // Si la requête se passe bien
        if($del->execute()){
            header('location:'.$_SERVER['HTTP_REFERER'].'&message=deleteOk');
        } else {
            echo 'Apprends à coder connard !!';
        }
    }
} else {
    echo 'Impossible de supprimer un utilisateur connecté !!';
}
?>