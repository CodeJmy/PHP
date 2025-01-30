<?php
class personne {
    // Attribut
    public $sexe;
    public $nom;
    public $prenom;
    public $age;

    // Méthodes
    public function __construct($sexe, $nom, $prenom, $age) {
        $this->sexe = $sexe;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
    }
    public function getsexe()
    {
        return $this->sexe;
    }
    public function getnom()
    {
        return $this->nom;
    }
    public function getprenom()
    {
        return $this->prenom;
    }
    public function setsexe($newSexe) {
        $this->sexe = $newSexe;
    }
    public function setnom($newNom) {
        $this->nom = $newNom;
    }
    public function setprenom($newPrenom) {
        $this->prenom = $newPrenom;
    }
    public function setage($newAge) {
        $this->age = $newAge;
    }
    public function afficherInfos() {
        echo "Nom : {$this->nom}, Prénom : {$this->prenom}, Sexe : {$this->sexe}, Age : {$this->age} <br>";
    }
}

// Création d'une instance de la classe personne
$personne1 = new personne("Masculine","Costanzo","Irman",22);

// Affichage des informations de la personne
$personne1->afficherInfos();

// Création de la classe employer héritant de la classe personne

class employer extends personne {
    // Attribut
    public $entreprise;
    public $poste;
    public $salaire;

    // Méthode
    public function __construct($entreprise, $poste, $salaire) {
        parent::__construct("Masculine","Hilaire","Hugo",19);  // Appel du constructeur parent avec les mêmes paramètres
        $this->entreprise = $entreprise;
        $this->poste = $poste;
        $this->salaire = $salaire;
    }
    // Méthodes GET
    public function getentreprise() {
        return $this->entreprise;
    }
    public function getposte() {
        return $this->poste;
    }
    public function getsalaire() {
        return $this->salaire;
    }
    // Méthodes SET
    public function setentreprise ($newEntreprise) {
        $this->entreprise = $newEntreprise;
    }
    public function setposte($newPoste){
        $this->poste = $newPoste;
    }
    public function setsalaire($newSalaire){
        $this->salaire = $newSalaire;
    }
    // Surcharge de la méthode afficherInfos
    public function afficherInfosEmployer() {
        echo ", Entreprise : {$this->entreprise}, Poste : {$this->poste}, Salaire : {$this->salaire} <br>";
    }
    // Méthode pour augmenter le salaire de 10%
    public function augmenterSalaire() {
        $this->salaire += ($this->salaire * 0.10);
    }
}

// Création d'un instance de la classe employer 
$employer1 = new employer("MBDA","Ingénieur",3800);

// Affichage des informations de l'employé
$employer1->setentreprise("Garage Jafar");
$employer1->setPoste("Polyvalente");
$employer1->setsalaire(800);
$employer1->afficherInfosEmployer();
?>