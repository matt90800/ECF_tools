<?php 
class Lend {
    private $id;                           
    private $beginingDate;
    private $endDate;
    private $idUser;
    private $idGood;

    public function __construct($id, $beginingDate, $endDate, $idUser, $idGood) {
        $this->setId($id);
        $this->setBeginingDate($beginingDate;)
        $this->setEndDate($endDate);
        $this->setIdGood($idGood);
        $this->setIdUser($idUser);
    }


    public function setId($id){
        $this->id=$id;
    }

    public function getId(){
        return $this->id;
    }

    public function setBeginingDate($beginingDate){
        $this->beginingDate=$beginingDate;
    }

    public function getBeginingDate(){
        return $this->beginingDate;
    }

    public function setEndDate($endDate){
        $this->endDate=$endDate;
    }

    public function getEndDate(){
        return $this->endDate;
    }

    public function setIdUser($idUser){
        $this->idUser=$idUser;
    }
    
    public function getIdUser(){
        return $this->idUser;
    }
    
    public function setIdGood($idGood){
        $this->idGood=$idGood;
    }

    public function getIdGood(){
        return $this->idGood;
    }



}
