<?php
class Livre {
    // Attribut
    public $titre;
    public $auteur;
    public $anneeDePublication;
    public bool$disponible;

    // Méthodes
    public function __construct($titre, $auteur, $anneeDePublication, $disponible) {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->anneeDePublication = $anneeDePublication;
        $this->disponible = $disponible;   
    }
    public function getTitre()
    {
        return $this->titre;
    }
    public function getAuteur()
    {
        return $this->auteur;
    }
    public function getAnneeDePublication()
    {
        return $this->anneeDePublication;
    }
    public function getDisponible()
    {
        return $this->disponible;
    }
    public function setTitre($newTitre)
    {
        $this->titre = $newTitre;
    }
    public function setAuteur($newAuteur)
    {
        $this->auteur = $newAuteur;
    }
    public function setAnneeDePublication($newAnneeDePublication)
    {
        $this->anneeDePublication = $newAnneeDePublication;
    }
    public function setDisponible($newDisponible)
    {
        $this->disponible = $newDisponible;
    }

    // fonction pour indiqué si le livre est emprunté ou disponible
    public function disponible()
    {
        if ($this->disponible == true)
        {
            return "Disponible";
        } else {
            return "Emprunté";
        }
    }
    // fonction pour afficher les details du livre
    public function afficherLivre() {
        echo "Titre : {$this->titre} <br>";
        echo "Auteur : {$this->auteur} <br>";
        echo "Année de publication : {$this->anneeDePublication} <br>";
        echo "Statut : ". $this->disponible()."<br>";
    }
}

// Création d'un livre
$livre = new Livre('','','','');
$livre1 = new Livre("Le livre du mal", "Arthur rimbault", 1977, true);
$livre2 = new Livre("Le livre de la jungle", " Franklin Ran", 1990, false);
$livre3 = new Livre("Le livre du desert", "Hugues Martini", 2000, false);

// Affichage des informations du livre

$livre1->afficherLivre();
$livre2->afficherLivre();
$livre3->afficherLivre();

class membre {
    // Attribut
    public $nom;
    public $numeroDeMembre;
    public $livresEmpruntes;

    // Méthodes
    public function __construct($nom, $numeroDeMembre) {
        $this->nom = $nom;
        $this->numeroDeMembre = $numeroDeMembre;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getNumeroDeMembre()
    {
        return $this->numeroDeMembre;
    }
    public function getlivresEmpruntes()
    {
        return $this->livresEmpruntes;
    }
    public function setNom($newNom)
    {
        $this->nom = $newNom;
    }
    public function setNumeroDeMembre($newNumeroDeMembre)
    {
        $this->numeroDeMembre = $newNumeroDeMembre;
    }
    // fonction pour emprunter un livre
    public function livreEmpruntes($livres)
    {
        if ($livres->disponible == true) {
            $this->livresEmpruntes[] = $livres;
            $livres->setDisponible(false);
        } else {
            echo "Ce livre est déjà emprunté.";
        }
    }
    // fonction pour afficher les livres
    public function afficherLivresEmpruntes() {
        foreach ($this->livresEmpruntes as $livre) {
            echo $livre->getTitre()."<br>";
            echo $livre->getAuteur()."<br>";
            echo $livre->getAnneeDePublication()."<br>";
            echo $livre->disponible()."<br>";
        }
    }
}

// Création d'un membre

$membre = new Membre("Stéphane Carpentier", "A12345");
$membre->livreEmpruntes($livre1);
$membre->livreEmpruntes($livre2);
$membre->livreEmpruntes($livre3);
$membre->afficherLivresEmpruntes();
?>