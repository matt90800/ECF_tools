<?php
class Users {

    private $id;
    private $pseudo;
    private $lastname;
    private $firstname;
    private $password;
    private $email;
    private $earned_points;
    private $id_role;

        public function __construct($id,$pseudo,$lastname,$firstname,$password,$email,$earned_points,$id_role) {
        $this->setId($id);
        $this->setPseudo($pseudo);
        $this->setLastname($lastname);
        $this->setFirstname($firstname);
        $this->setPassword($password);
        $this->setEmail($email);
        $this->setEarnedPoints($earned_points);
        $this->setIdRole($id_role);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEarnedPoints()
    {
        return $this->earned_points;
    }

    public function setEarnedPoints($earned_points)
    {
        $this->earned_points = $earned_points;
    }

    public function getIdRole()
    {
        return $this->id_role;
    }

    public function setIdRole($id_role)
    {
        $this->id_role = $id_role;
    }


}
