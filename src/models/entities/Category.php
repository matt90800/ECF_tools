<?php 
class Lend {
    private $id;                           
    private $name;


    public function __construct($id, $name) {
        $this->setIdLend($id);
        $this->setBeginingDate($name;)

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

}
