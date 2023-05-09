<?php 
class Good {
    private $id;                           
    private $name;
    private $visual;
    private $description;
    private $points;
    private $idCategory;
    private $idUser;

    public function __construct($id, $name, $visual, $description, $points,$idCategory,$idUser) {
        $this->setId($id);
        $this->setName($name;)
        $this->setVisual($visual);
        $this->setDescription($description);
        $this->setPoints($points);
        $this->setIdCategory($idCategory);
        $this->setIdUser($idUser);
    }


    public function setId($id){
        $this->id=$id;
    }

    public function getId(){
        return $this->id;
    }

    public function setName($name){
        $this->name=$name;
    }

    public function getName(){
        return $this->name;
    }

    public function setVisual($visual){
        $this->visual=$visual;
    }

    public function getVisual(){
        return $this->visual;
    }

    public function setDescription($description){
        $this->description=$description;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setPoints($points){
        $this->points=$points;
    }

    public function getPoints(){
        return $this->points;
    }

    public function setIdCategory($idCategory){
        $this->idCategory=$idCategory;
    }

    public function getIdCategory(){
        return $this->idCategory;
    }

    public function setIdUser($idUser){
        $this->idUser=$idUser;
    }

    public function getIdUser(){
        return $this->idUser;
    }




}
