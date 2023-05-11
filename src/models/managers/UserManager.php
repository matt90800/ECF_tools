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

    public static function getUserByEmail(String $email) {
        $pdo = DatabaseConnection::getConnection();
        $sql = "SELECT * FROM users WHERE email= :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
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

    public static function connectUser($email, $password) {
        $user=self::getUserByEmail($email);
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

    public static function updateUser(User $user) {
        $pdo = DatabaseConnection::getConnection();
        $sql = "UPDATE  users SET 
          pseudo=:pseudo, 
          lastname=:lastname, 
          firstname=:firstname, 
          password=:password, 
          email=:email, 
          earned_points=:points, 
          id_role=:role 
          WHERE id=:id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id",$user->getId());
        $stmt->bindValue(':pseudo', $user->getPseudo());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':points', $user->getEarnedPoints());
        $stmt->bindValue(':role', $user->getRole()->getId());
        $executeBool = $stmt->execute();
        return $executeBool ? $user : $executeBool;
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