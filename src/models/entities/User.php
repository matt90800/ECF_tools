<?php
class User {

    private $id;
    private $pseudo;
    private $lastname;
    private $firstname;
    private $password;
    private $email;
    private $earned_points;
    private $role;
    private $tools=array();

        public function __construct(int $id,?string $pseudo,string $lastname,string $firstname,string $password,string $email,int $earned_points,Role $role) {
        $this->setId($id);
        $this->setPseudo($pseudo);
        $this->setLastname($lastname);
        $this->setFirstname($firstname);
        $this->setPassword($password);
        $this->setEmail($email);
        $this->setEarnedPoints($earned_points);
        $this->setRole($role);
        

    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getPseudo(){
        return is_null($this->pseudo) ? "anonyme" : $this->pseudo;
    }

    public function setPseudo($pseudo)  {
        $pseudo=($pseudo=="anonyme") ? "" : $pseudo;
        $this->pseudo = $pseudo;
    }

    public function getLastname(){
        return $this->lastname;
    }

    public function setLastname($lastname){
        $this->lastname = $lastname;
    }

    public function getFirstname(){
        return $this->firstname;
    }

    public function setFirstname($firstname){
        $this->firstname = $firstname;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEarnedPoints(){
        return $this->earned_points;
    }

    public function setEarnedPoints($earned_points){
        $this->earned_points = $earned_points;
    }

    public function getRole(){
        return $this->role;
    }

    public function setRole($role){
        $this->role = $role;
    }
    public function getTools(){
        return $this->tools;
    }

    public function setTools(array $tools){
        foreach ($tools as $tool) {
            if ($tool instanceof Tool) {
                $this->tools[] = $tool;
            } else {
                throw new InvalidArgumentException('Invalid tool provided');
            }
        }
    }

    public function addTool(Tool ...$tool){
        array_push($tools,$tool);

    }

}
