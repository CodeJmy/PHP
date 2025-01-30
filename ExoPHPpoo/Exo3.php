<?php
// Vang Jimmy
// Gestion des employés 
// Créer un objet employer pour gérer les informations 
class employes {
    // Attributs
    private string $nom;
    private int $age;
    private string $poste;
    private float $Salaire;
    private string $dateEmbauche;

    // fonction Constructor 
    public function __construct($nom, $age, $poste, $Salaire, $dateEmbauche) 
    {
        $this->nom = $nom;
        $this->age = $age;
        $this->poste = $poste;
        $this->Salaire = $Salaire;
        $this->dateEmbauche = $dateEmbauche;
    }

    // Getters
    public function getNom() {
        return $this->nom;
    }
    public function getAge() {
        return $this->age;
    }
    public function getPoste() {
        return $this->poste;
    }
    public function getSalaire() {
        return $this->Salaire;
    }
    public function getDateEmbauche() {
        return $this->dateEmbauche;
    }
    
    // Setters

    // fonction pour modifié le Nom
    public function setNom($newNom) {
        $this->nom = $newNom;
    }
    // Fonction Age pour vérifier si l'age est un entier positif 
    public function setAge($newAge) {
        // Vérification entier positif
        if ($newAge>0 ) {
            $this->age = $newAge;
        }
        else 
        {
            echo "L'age doit être un entier positif.";
        }
    }
    // Fonction Poste
    public function setPoste($newPoste) {
        $this->poste = $newPoste;
    }
    // fonction pour vérifier si un Salaire est un entier positif
    public function setSalaire($newSalaire) {
        if ($newSalaire>0) {
            $this->Salaire = $newSalaire;
        }
        else
        {
            echo "Le salaire doit être un entier positif.";
        }
    }
    // fonction pour modifier la Date d'embauche
    public function setDateEmbauche($newDateEmbauche) {
        $this->dateEmbauche = $newDateEmbauche;
    }
    // Méthodes pour calculer le salaire mensuel * 12
    public function calculerSalaireMensuel() {
        return $this->Salaire * 12;
    }
    // Méthodes pour augmenter le salaire en pourcentage
    public function augmenterSalaire($pourcent) {
        $pourcent = $pourcent/100+1;
        $this->Salaire = $this->Salaire * $pourcent;
        return $this->Salaire.' €';
    }
    // Méthodes pour afficher les employes
    public function afficherEmploye() {
        echo "Nom : ". $this->nom. ", Age : ". $this->age. ", Poste : ". $this->poste. ", Salaire : ". $this->calculerSalaireMensuel(). ", Date d'embauche : ". $this->dateEmbauche."<br>";
    }
    // Méthode pour calculer le nombre de jours travaillés depuis l'embauche
    public function calculerJoursTravailles() {
        // On récupère la date actuelle
        $dateActuelle = new DateTime();
        // On convertit la date d'embauche en DateTime
        $dateEmbauche = DateTime::createFromFormat('Y-m-d', $this->dateEmbauche);
        // On calcule la différence en jours
        $interval = $dateActuelle->diff($dateEmbauche);
        // On retourne le nombre de jours
        return $interval->days;
    }
}

// Test
// Employes 1
$employe1 = new Employes("Stéphane Carpentier", 54, "Manager", 3000, "2016-01-01");
$employe1->afficherEmploye();

// Employes 2
$employe2 = new Employes("Ilan Senouci", 31, "Devellopeur Web", 3500, "2012-05-15");
$employe2->afficherEmploye();

// Jours travaillés depuis l'embauche de Stephane
echo "Jours travaillés depuis l'embauche de Stephane : ". $employe1->calculerJoursTravailles(). " jours.<br>";
// Jours travaillés depuis l'embauche de Ilan
echo "Jours travaillés depuis l'embauche de Ilan : ". $employe2->calculerJoursTravailles(). " jours.<br>";
//Augmentation du salaire de Stéphane
echo "Augmentation du salaire de Stephane de 15% : ". $employe1->augmenterSalaire(15). ".<br>";
?>