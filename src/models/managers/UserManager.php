<?php

/* require_once 'connect.php';
require_once './Model/Entities/User.php'; */

class UserManager{

    public static function getUsers()
    {
        $pdo = DatabaseConnection::getConnection();
        $sql = "SELECT * FROM users";
        $stmt= $pdo->prepare($sql);// on utilise la methode prepare de l'objet PDO; On récupère un objet PDOStatement
        $stmt->execute();// on exécute le statement
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'User'); //on récupère les données sous la forme d'une classe User
        return $results;
    }

    public static function insertUser(String $name, string $firstname, string $email, String $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $pdo = DatabaseConnection::getConnection();
        $sql = "INSERT INTO users (lastname,firstname,email, password) VALUES (:name,:firstname,:email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();
        $newUser = $pdo->lastInsertId();
        return $newUser;
    }

    public static function connectUser($name, $password)
    {
        $pdo = DatabaseConnection::getConnection();
        $sql = "SELECT * FROM users WHERE name= :name ;
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Users');
        $user = $stmt->fetch();
        if($user) {
            $registeredPassword = $user->getPassword();
            $verifiedUser = password_verify($password, $registeredPassword);
            if($verifiedUser){
                session_start(); //on lance la session avec session
                $_SESSION['user'] = [
                    'id' => $user->getId(),
                    'name' => $user->getName()
                ];
            }
        }else{
            return false;
        }
    }
}