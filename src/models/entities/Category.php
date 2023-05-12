<?php 
class Category {
    private $id;                           
    private $name;


    public function __construct(int $id,string $name) {
        $this->setId($id);
        $this->setName($name);

    }


    public function setId(int $id){
        $this->id=$id;
    }

    public function getId(){
        return $this->id;
    }

    public function setName(string $name){
        $this->name=$name;
    }

    public function getName(){
        return $this->name;
    }

}
