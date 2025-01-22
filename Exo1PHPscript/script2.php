<?php
session_start();

function ajouterProduitPanier($produit,$quantite){
    // Je vérifie si tableau panier dans $_SESSION n'existe pas et je le crée
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
    }
    // J'ajoute le produit et la quantité quantité
    $_SESSION['panier'][$produit] = $quantite;
}

function viderPanier(){
    // Déstruction de la session
    session_unset();
    session_destroy();
}

// Je vérifie que le form à été soumis
if(isset($_POST['submit'])){
    // Je vérifie que les champs sont bien remplis 
    if (!empty($_POST['produit']) && !empty($_POST['quantite'])){
        // J'appelle ma fonction ajouterProduitPanier()
        ajouterProduitPanier($_POST['produit'],$_POST['quantite']);
    }
}

// Je vérifie que $_SESSION['panier'] existe
if(isset($_SESSION['panier'])){
    // Je boucle sur $_SESSION pour afficher tout les produits et leurs quantités
    foreach($_SESSION['panier'] as $key => $value){
        echo $key.' => '.$value.'<br>';
    }
}

// Je vérifie que mon bouton 'vider' soit bien soumis
if(isset($_POST['vider'])){
    // Je vérifie que les deux champs soit bien vides
    if(empty($_POST['produit']) && empty($_POST['quantite'])){
        // J'appelle ma fonction viderPanier()
        viderPanier();
        header('location:script2.php');
    }
}
?>