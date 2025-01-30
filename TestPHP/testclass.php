<?php
class avion {
    private $marque;
    private $modele;
    private $annee;

    // Constructeur
    public function __construct($marque, $modele, $annee) {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
    }
    // Getters
    public function getMarque() {
        return $this->marque;
    }
    public function getModele() {
        return $this->modele;
    }
    public function getAnnee() {
        return $this->annee;
    }
    // Méthodes
    public function afficheInfoAvion() {
        echo "Marque : {$this->marque}, Modèle : {$this->modele}, Année : {$this->annee} <br>";
    }   
}

// Utilisation

$avion1 = new avion("Airbus", "A320", 2022);
$avion1->afficheInfoAvion();

$avion2 = new avion("Boeing", "777", 2015);
$avion2->afficheInfoAvion();
?>