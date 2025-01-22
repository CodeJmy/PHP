<?php
class Personne {
    // Propriétés
    private $nom;
    private $prenom;
    private $age;

    // Constructeur
    public function __construct($nom, $prenom, $age) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
    }

    // Méthodes pour obtenir les propriétés
    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getAge() {
        return $this->age;
    }

    // Méthodes pour définir les propriétés
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setAge($age) {
        if ($age >= 0) {
            $this->age = $age;
        } else {
            throw new Exception("L'âge doit être un nombre positif.");
        }
    }

    // Méthode pour afficher les informations de la personne
    public function afficherInformations() {
        return "Nom : " . $this->nom . ", Prénom : " . $this->prenom . ", Âge : " . $this->age . " ans.";
    }
}

// Exemple d'utilisation
try {
    $personne = new Personne("Dupont", "Jean", 30);
    echo $personne->afficherInformations(); // Affiche les infos de la personne

    $personne->setAge(35); // Met à jour l'âge
    echo "\n" . $personne->afficherInformations();
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
