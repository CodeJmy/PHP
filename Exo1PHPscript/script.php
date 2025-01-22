<?php

/**
 * Tristan Deschamp
 * Ajouter un prduit et une quantité dans un panier
 * Création, Lecture et Supression du panier
 * et affichage du panier dans une page Web.
 * Janvier 2025
 */

 // Démarre une session
session_start();

/**
 * Création de la classe Panier
 * Cette classe permet de gérer un panier d'achat avec les actions : ajouter un produit, vider le panier et afficher son contenu.
 */
class Panier
{
 // Tableau privé contenant les produits et leurs quantités
 private $produits = [];

 /**
  * Fonction Constructeur de la classe : initialise le panier en vérifiant s'il existe déjà en session
  */
 public function __construct()
 {
  // Si le panier n'existe pas dans la session, il est créé
  if (!isset($_SESSION['panier']))
  {
   $_SESSION['panier'] = [];
  }

  // Charge le panier de la session dans l'attribut de l'objet
  $this->produits = $_SESSION['panier'];
 }

 /**
  * Fonction ajouterUnProduit qui gère le CREATE
  * @param string $produit Nom du produit
  * @param int $quantite Quantité à ajouter
  */
 public function ajouterProduit(string $produit, int $quantite): void
 {
  // Vérifie si le produit existe déjà dans le panier, sinon l'ajoute
  if (isset($this->produits[$produit]))
  {
   $this->produits[$produit] += $quantite;
  } else {
   $this->produits[$produit] = $quantite;
  }

  // Sauvegarde le panier dans la session
  $this->sauvegarderSession();
 }

 /**
  * Fonction viderPanier qui gère le DELETE
  */
 public function viderPanier(): void
 {
  $this->produits = []; // Réinitialise le tableau des produits
  $this->sauvegarderSession(); // Sauvegarde la modification dans la session
 }

 /**
  * Fonction afficherContenu du panier qui gère le READ
  */
 public function afficherContenu(): void
 {
  // Vérifie si le panier n'est pas vide
  if (!empty($this->produits))
  {
   echo "<ul>";
   foreach ($this->produits as $produit => $quantite)
   {
    // Affiche chaque produit et sa quantité en sécurisant l'affichage
    echo "<li>" . htmlspecialchars($produit) . " : " . (int)$quantite . "</li>";
   }
   echo "</ul>";
  } else {
   // Message si le panier est vide
   echo "<p>Le panier est vide.</p>";
  }
 }

 /**
  * Fonction pour sauvegarder l'état du panier en cas de modification
  */
 private function sauvegarderSession(): void
 {
  $_SESSION['panier'] = $this->produits;
 }
}

// Création de l'objet Panier
$panier = new Panier();

// Gestion des actions du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 // Si l'utilisateur clique sur "Ajouter au panier"
 if (isset($_POST['ajouter'])) {
  // Récupération des données du formulaire en sécurisant les entrées
  $produit = trim(htmlspecialchars($_POST['produit']));
  $quantite = (int)$_POST['quantite'];

  // Vérifie que les données sont valides avant d'ajouter au panier
  if (!empty($produit) && $quantite > 0) {
   $panier->ajouterProduit($produit, $quantite);
  } else {
   echo "<p style='color:red;'>Veuillez saisir un produit valide.</p>";
  }
 }

 // Si l'utilisateur clique sur "Vider le panier"
 if (isset($_POST['vider'])) {
  $panier->viderPanier();
 }
}

?>