<?php

/* require_once 'connect.php';
require_once './Models/Entities/Users.php';*/

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

    public static function connectUser($name, $password) {
        $pdo = DatabaseConnection::getConnection();
        $sql = "SELECT id, pseudo, lastname, firstname, password, email,earned_points, id_role FROM users WHERE lastname= :name" ;
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        $result = $stmt->fetch();
        //on ne peux pas utliser fetchClass avec un constructeur défini ??
        $user = new Users($result['id'], $result['pseudo'], $result['lastname'], $result['firstname'], $result['password'], $result['email'], $result['earned_points'], $result['id_role']);
        if($user) {
            $registeredPassword = $user->getPassword();
            $verifiedUser = password_verify($password, $registeredPassword);
            if($verifiedUser){
//                session_start()? print('Bienvenue') : print("Connection echouée"); //on lance la session avec session
                $_SESSION['user'] = [
                    'id' => $user->getId(),
                    'name' => $user->getLastName()
                ];
            }
        } else {
            return false;
        }
    }

    public static function disconnectUser(/* $name */) {
        unset($_SESSION['user']);
    }
}