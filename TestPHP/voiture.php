<?php
class voiture {
    // Propriétés / Attributs
    private $marque;
    private $modele;
    private $couleur;
    
    // Constructeur / Méthodes
    public function MakeVoiture($marque, $modele, $couleur)
        {
            $this->marque = $marque;
            $this->modele = $modele;
            $this->couleur = $couleur;
        }
        public function getmarque()
        {
            return $this->marque;
        }
        public function getmodele()
        {
            return $this->marque;
        }
        public function getcouleur()
        {
            return $this->marque;
        }
        public function setmarque($nom) {
            $this->marque = $nom;
        }
    
        public function setmodele($prenom) {
            $this->modele = $prenom;
        }
        // Méthode pour afficher les informations de la voiture
    public function afficherInformationsvoiture() {
        return "Marque : " . $this->marque . ", Modèle : " . $this->modele . ", Couleur : " . $this->couleur . ".";
    }
}
try
{
    $voiture = new voiture();
    $voiture->MakeVoiture("Ford", "Mustang", "rouge");
    $voiture->setmodele($prenom = "Fiesta");
    echo $voiture->afficherInformationsVoiture();
}
 catch (Exception $e) {
    echo 'Erreur : ',  $e->getMessage(), "\n";
}
?>