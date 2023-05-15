 <?php

/* require_once 'connect.php';
require_once './Models/Entities/Users.php';*/

class LendManager implements ManagerInterface{
 
  public static function add($lend):bool {
    $pdo = DatabaseConnection::getConnection();
    $sql = "INSERT INTO lend (
      begining_date, 
      end_date, 
      id_users,
      id_tool) 
    VALUES (
      :beginingDate,
      :endDate,
      :idUser,
      :idTool)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':beginingDate', $lend->getBeginingDate());
    $stmt->bindValue(':endDate', $lend->getEndDate());
    $stmt->bindValue(':idUser', $lend->getUser()->getId());
    $stmt->bindValue(':idTool', $lend->getTool()->getId());
    var_dump($stmt);
    $executeBool = $stmt->execute();
    //  $resultID=$pdo->lastInsertId();
    $lend->setId($pdo->lastInsertId());
    return $executeBool;
  }

  public static function getById(int $id) {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM lend WHERE id= :id" ;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch();
    var_dump($result);
    return self::createLend($result);
  }

  public static function getAllByTool(int $toolId):array {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM lend WHERE id_tool= :id" ;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $toolId);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $lendArray = array();
    foreach  ($result as $row) {
      array_push(
        $lendArray,
        self::createLend($row)
      );
    }
    return $lendArray;
  }

  public static function getAll():array {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM lend";
    $lendArray = array();
    foreach  ($pdo->query($sql) as $row) {
      array_push(
        $lendArray,
        self::createLend($row)
      );
    }
    return $lendArray;
  }

  static function update($entity): bool {
    return false;
  }

  static function delete(int $id):bool{
    $pdo = DatabaseConnection::getConnection();
    $sql="DELETE FROM lend WHERE (id=:id)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id",$id);
    $executeBool = $stmt->execute();
    // $result=$stmt->fetchAll();
    //  self::$pdo=null;
    return $executeBool;
  }

  //utility entity instanciation method
  private static function createLend($array){
    return $lend = new Lend(
        $array['id'],
        new DateTime($array['begining_date']),
        new DateTime($array['end_date']),
        UserManager::getById($array['id_users']),
        ToolManager::getById($array['id_tool'])
    );
  } 

}