<?php 
class Lend {
    private $id;                           
    private $beginingDate;
    private $endDate;
    private $user;
    private $tool;

    public function __construct(int $id,DateTime $beginingDate,DateTime $endDate,User $user,Tool $tool) {
        $this->setId($id);
        $this->setBeginingDate($beginingDate);
        $this->setEndDate($endDate);
        $this->setTool($tool);
        $this->setUser($user);
    }


    public function setId(int $id){
        $this->id=$id;
    }

    public function getId(){
        return $this->id;
    }

    public function setBeginingDate(DateTime $beginingDate){
        $this->beginingDate=$beginingDate;
    }

    public function getBeginingDate(){
        return $this->beginingDate;
    }

    public function setEndDate(DateTime $endDate){
        $this->endDate=$endDate;
    }

    public function getEndDate(){
        return $this->endDate;
    }

    public function setUser(User $user){
        $this->user=$user;
    }
    
    public function getUser(){
        return $this->user;
    }
    
    public function setTool(Tool $tool){
        $this->tool=$tool;
    }

    public function getTool(){
        return $this->tool;
    }



}
