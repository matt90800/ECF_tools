 <?php

/* require_once 'connect.php';
require_once './Models/Entities/Users.php';*/

class LendManager implements ManagerInterface{
 
  public static function add(Lend $lend) {
    $pdo = DatabaseConnection::getConnection();
    $sql = "INSERT INTO lend (
      begining_date, 
      end_date, 
      id_user,
      id_goody) 
    VALUES (
      :beginingDate
      :endDate
      :idUser
      :idGood)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':beginingDate', $lend->getBeginingDate());
    $stmt->bindValue(':endDate', $lend->getEndDate());
    $stmt->bindValue(':idUser', $lend->getIdUser());
    $stmt->bindValue(':idLend', $lend->getIdGood());
    $executeBool = $stmt->execute();
  //  $resultID=$pdo->lastInsertId();
    $lend->setId($pdo->lastInsertId());
    return $lend;
  }

  public static function getById(int $idLend) {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM lend WHERE id= :id" ;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $idLend);
    $stmt->execute();
    $result = $stmt->fetch();
    return $lend = new Lend(
            $row['id'],
            $row['begining_date'],
            $row['end_date'],
            $row['id_user'],
            $row['id_good']
      );
  }

  public static function getAll() {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM lend";
    $lendArray = array();
    foreach  ($pdo->query($sql) as $row) {
      array_push(
        $lendArray,
          new Lend(
            $row['id'],
            $row['begining_date'],
            $row['end_date'],
            $row['id_user'],
            $row['id_good']
          );
      );
    }
    return $lendArray;
  }


  static function delete(int $id){
    $pdo = DatabaseConnection::getConnection();
    $sql="DELETE FROM lend WHERE (id=:id)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id",$id);
    $executeBool = $stmt->execute();
    // $result=$stmt->fetchAll();
    //  self::$pdo=null;
    return $executeBool ? $lend : $executeBool;
  }

}