<?php

/* require_once 'connect.php';
require_once './Models/Entities/Users.php';*/

class RoleManager{
 
  public static function addRole(Role $role) {
    $pdo = DatabaseConnection::getConnection();
    $sql = "INSERT INTO Role (name) VALUES (:name)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $role->getName());
    $executeBool = $stmt->execute();
    $role->setId($pdo->lastInsertId());
    return $role;
  }

  public static function getRoles() {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM role";
    $toolArray = array();
    foreach  ($pdo->query($sql) as $row) {
      array_push(
        $toolArray,
          self::createRole($row)
      );
    }
    return $toolArray;
  }

  public static function getRoleById(int $id) {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM role WHERE id= :id" ;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch();
    return self::createRole($result);
  }
  
  public static function getRoleByUser(int $idUser) {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM role WHERE id_user= :idUser" ;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_user', $idUser);
    $stmt->execute();
    $result = $stmt->fetch();
    return self::createRole($result);
  }
  
  static function deleteRole(int $idRole){
    $pdo = DatabaseConnection::getConnection();
    $sql="DELETE FROM role WHERE (id=:id)";
    $stmt = $pdo->prepare($sql);
/*     $id=$role->getId(); */
    $stmt->bindParam(":id",$idRole);
    $executeBool = $stmt->execute();
    // $result=$stmt->fetchAll();
    //  self::$pdo=null;
    return $executeBool ? $role : $executeBool;
  }

  private static function createRole($array){
    return new Role(
      $array['id'],
      $array['name']
    );
  } 

}