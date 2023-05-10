<?php
//  require_once "models/entities/Tool.php";
/* require_once 'connect.php';
require_once './Models/Entities/Users.php';*/

class ToolManager{
 
  public static function addTool(Tool $tool) {
    echo '<pre>';
    var_dump($tool);
    echo '</pre>';
    $pdo = DatabaseConnection::getConnection();
    $sql = "INSERT INTO tool (
      name, 
      visual, 
      description, 
      points, 
      id_category, 
      id_users) 
    VALUES (
      :name,
      :visual,
      :description,
      :points,
      :id_category,
      :id_users)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $tool->getName());
    $stmt->bindValue(':visual', $tool->getVisual());
    $stmt->bindValue(':description', $tool->getDescription());
    $stmt->bindValue(':points', $tool->getPoints());
    $stmt->bindValue(':id_category', $tool->getIdCategory());
    $stmt->bindValue(':id_users', $tool->getIdUser());
    $executeBool = $stmt->execute();
    $tool->setId($pdo->lastInsertId());
    return $executeBool ? $tool : $executeBool;
  }

  public static function getTools() {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM tool";
    $toolArray = array();
    foreach  ($pdo->query($sql) as $row) {
      array_push(
        $toolArray,
          self::createTool($row)
      );
    }
    return $toolArray;
  }

  
  public static function getToolById(int $idTool) {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM tool WHERE id= :idTool" ;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idTool', $idTool);
    $stmt->execute();
    $result = $stmt->fetch();
    //on ne peux pas utliser fetchClass avec un constructeur défini ??
    return self::createTool($result);
  }
  
  public static function getToolByUser(int $idUser) {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM tool WHERE id_user= :idUser" ;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_user', $idUser);
    $stmt->execute();
    $result = $stmt->fetch();
    //on ne peux pas utliser fetchClass avec un constructeur défini ??
    return self::createTool($result);
  }
  
  static function deleteTool(int $id){
    $pdo = DatabaseConnection::getConnection();
    $sql="DELETE FROM tool WHERE (id=:id)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id",$id);
    $executeBool = $stmt->execute();
    // $result=$stmt->fetchAll();
    //  self::$pdo=null;
    return $executeBool ? $id : $executeBool;
  }
  
  private static function createTool($array){
    return new Tool(
      $array['id'],
      $array['name'],
      $array['visual'],
      $array['description'],
      $array['points'],
      $array['id_category'],
      $array['id_users']
    );
  } 
}