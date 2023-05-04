<?php 
class Good {
    private $id;
    private $nom;
    private $categorie;
    private $description;
    private $proprietaire;
    private $points;

    public function __construct($id, $nom, $categorie, $description, $proprietaire) {
        $this->id = $id;
        $this->nom = $nom;
        $this->categorie = $categorie;
        $this->description = $description;
        $this->proprietaire = $proprietaire;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getProprietaire() {
        return $this->proprietaire;
    }
    public function getPoints() {
        return $this->points;;
    }
    public function setId($id) {
        $this->id=$id;
    }

    public function setNom($nom) {
        $this->nom=$nom;
    }

    public function setCategorie($categorie) {
        $this->categorie=$categorie;
    }

    public function setDescription($description) {
        $this->description=$description;
    }

    public function setProprietaire($proprietaire) {
        $this->proprietaire=$proprietaire;
    }
    public function setPoints($points) {
        $this->points=$points;
    }
}
