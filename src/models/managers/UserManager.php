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

    public static function insertUser(String $pseudo, String $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); 
        $pdo = DatabaseConnection::getConnection();
        $sql = "INSERT INTO users (pseudo, password) VALUES (:pseudo, :password)";
        $stmt = $pdo->prepare($sql); 
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();
        $newUser = $pdo->lastInsertId();
        return $newUser;
    }

    public static function connectUser($pseudo, $password)
    {
        $pdo = DatabaseConnection::getConnection();
        $sql = "SELECT * FROM users WHERE pseudo= :pseudo";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
        if($user) {
            $registeredPassword = $user->getPassword();
            $verifiedUser = password_verify($password, $registeredPassword);
            if($verifiedUser){
                session_start(); //on lance la session avec session
                $_SESSION['user'] = [
                    'id' => $user->getId(),
                    'pseudo' => $user->getPseudo()
                ];
            }
        }else{
            return false;
        }
    }
}