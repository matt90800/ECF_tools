<?php

/* require_once 'connect.php';
require_once './Models/Entities/Users.php';*/

class RoleManager implements ManagerInterface{
 
  public static function add($role):bool {
    $pdo = DatabaseConnection::getConnection();
    $sql = "INSERT INTO Role (name) VALUES (:name)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $role->getName());
    $executeBool = $stmt->execute();
    $role->setId($pdo->lastInsertId());
    return $executeBool;
  }

  public static function getById(int $id) {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM role WHERE id= :id" ;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch();
    return self::createRole($result);
  }

  public static function getAll():array {
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

  public static function getByUser(int $idUser) {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM role WHERE id_user= :idUser" ;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_user', $idUser);
    $stmt->execute();
    $result = $stmt->fetch();
    return self::createRole($result);
  }
  
  public static function update($tool):bool {

    return false;
  }

  static function delete(int $id):bool{
    $pdo = DatabaseConnection::getConnection();
    $sql="DELETE FROM role WHERE (id=:id)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id",$id);
    $executeBool = $stmt->execute();
    // $result=$stmt->fetchAll();
    //  self::$pdo=null;
    return $executeBool;
  }

  private static function createRole($array){
    return new Role(
      $array['id'],
      $array['name']
    );
  } 

}