<?php 
class Tool {
    private $id;                           
    private $name;
    private $visual;
    private $description;
    private $points;
    private $category;
    private $user;

    public function __construct(int $id,string $name,?string $visual,string $description,int $points,Category $category,User $user) {
        $this->setId($id);
        $this->setName($name);
        $this->setVisual($visual);
        $this->setDescription($description);
        $this->setPoints($points);
        $this->setCategory($category);
        $this->setUser($user);
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

    public function setVisual(?string $visual){
        $this->visual=$visual;
    }

    public function getVisual(){
        return $this->visual;
    }

    public function setDescription(string $description){
        $this->description=$description;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setPoints(int $points){
        $this->points=$points;
    }

    public function getPoints(){
        return $this->points;
    }

    public function setCategory(Category $category){
        $this->category=$category;
    }

    public function getCategory(){
        return $this->category;
    }

    public function setUser(User $user){
        $this->user=$user;
    }

    public function getUser(){
        return $this->user;
    }




}
