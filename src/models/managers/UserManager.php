<?php

/* require_once 'connect.php';
require_once './Models/Entities/Users.php';*/

class UserManager{

    public static function getUsers() {
        $pdo = DatabaseConnection::getConnection();
        $sql = "SELECT * FROM users";
        $UserArray = array();
        foreach  ($pdo->query($sql) as $row) {
            array_push(
                $UserArray,
                self::createUser($row)
            );
        }
        return $UserArray;
    }

    public static function getUserById(int $id) {
        $pdo = DatabaseConnection::getConnection();
        $sql = "SELECT * FROM users WHERE id= :id" ;
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return self::createUser($result);
    }

    public static function getUserByName(String $name) {
        $pdo = DatabaseConnection::getConnection();
        $sql = "SELECT * FROM users WHERE lastname= :name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        $result = $stmt->fetch();
        return self::createUser($result);
    }

    public static function insertUser(string $name,string $firstname,string $email,?String $password) {
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
        $user=self::getUserByName($name);
        if($user) {
            $registeredPassword = $user->getPassword();
            $verifiedUser = password_verify($password, $registeredPassword);
            if($verifiedUser){
//                session_start()? print('Bienvenue') : print("Connection echouée"); //on lance la session avec session
                $_SESSION['user'] = [
                    'id' => $user->getId(),
                    'name' => $user->getLastName(),
                    'role' => $user->getRole()
                ];
            }
        } else {
            return false;
        }
    }

    public static function disconnectUser(/* $name */) {
        unset($_SESSION['user']);
    }

    private static function createUser($array){
        return new User(
            $array['id'],
            $array['pseudo'],
            $array['lastname'],
            $array['firstname'],
            $array['password'],
            $array['email'],
            $array['earned_points'],
            RoleManager::getRoleById(
            ($array['id_role'])
            ) 
            );
      } 
}