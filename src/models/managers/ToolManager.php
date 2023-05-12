<?php
//  require_once "models/entities/Tool.php";
/* require_once 'connect.php';
require_once './Models/Entities/Users.php';*/

class ToolManager implements ManagerInterface{
 
      /**
     * @param Tool $tool
     * @return T
     */
  public static function add($tool):bool {
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
    $stmt->bindValue(':id_category', $tool->getCategory()->getId());
    $stmt->bindValue(':id_users', $tool->getUser()->getId());
    $executeBool = $stmt->execute();
    $tool->setId($pdo->lastInsertId());
    return $executeBool;
  }

  public static function getAll():array {
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

  
  public static function getById(int $idTool) {
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
    $sql = "SELECT * FROM tool WHERE id_users= :idUser" ;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idUser', $idUser);
    $stmt->execute();
    $toolArray = array();
    foreach  ($stmt->fetchAll() as $row) {
      array_push(
        $toolArray,
          self::createTool($row)
      );
    }
    return $toolArray;
  }

  public static function update($tool): bool {
    $pdo = DatabaseConnection::getConnection();
    $sql = "UPDATE  tool SET 
      name=:name, 
      visual=:visual, 
      description=:description, 
      points=:points, 
      id_category=:id_category, 
      id_users=:id_users 
      WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id",$tool->getId());
    $stmt->bindValue(':name', $tool->getName());
    $stmt->bindValue(':visual', $tool->getVisual());
    $stmt->bindValue(':description', $tool->getDescription());
    $stmt->bindValue(':points', $tool->getPoints());
    $stmt->bindValue(':id_category', $tool->getCategory()->getId());
    $stmt->bindValue(':id_users', $tool->getUser()->getId());
    $executeBool = $stmt->execute();
    return $executeBool ;
  }
  
  public static function delete(int $id):bool {
    $pdo = DatabaseConnection::getConnection();
    $sql="DELETE FROM tool WHERE (id=:id)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id",$id);
    $executeBool = $stmt->execute();
    // $result=$stmt->fetchAll();
    //  self::$pdo=null;
    return $executeBool;
  }
  
  private static function createTool($array){
    return new Tool(
      $array['id'],
      $array['name'],
      $array['visual'],
      $array['description'],
      $array['points'],
      CategoryManager::getById(
        $array['id_category']
      ),
      UserManager::getById(
        ($array['id_users'])
      ) 
    );
  } 
}