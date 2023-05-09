 <?php

/* require_once 'connect.php';
require_once './Models/Entities/Users.php';*/

class CategoryManager{
 
  public static function addCategory(Category $category) {
    $pdo = DatabaseConnection::getConnection();
    $sql = "INSERT INTO category (name) VALUES (:name)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $lend->getName());
    $executeBool = $stmt->execute();
  //  $resultID=$pdo->lastInsertId();
    $category->setId($pdo->lastInsertId());
    return $category;
  }

  public static function getLends() {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM lend";
    $lendArray = array();
    foreach  ($pdo->query($sql) as $row) {
      array_push(
        $lendArray,
          new Lend(
            $row['id_lend'],
            $row['begining_date'],
            $row['end_date'],
            $row['id_user'],
            $row['id_good']
          );
      );
    }
    return $lendArray;
  }
  public static function getLend(int $idLend) {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM lend WHERE id_lend= :idLend" ;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idLend', $idLend);
    $stmt->execute();
    $result = $stmt->fetch();
    return $lend = new Lend(
            $row['id_lend'],
            $row['begining_date'],
            $row['end_date'],
            $row['id_user'],
            $row['id_good']
      );
  }

  static function deleteLend(Lend $lend){
    $pdo = DatabaseConnection::getConnection();
    $sql="DELETE FROM lend WHERE (id=:id)";
    $stmt = $pdo->prepare($sql);
    $id=$lend->getIdLend();
    $stmt->bindParam(":id",$id);
    $executeBool = $stmt->execute();
    // $result=$stmt->fetchAll();
    //  self::$pdo=null;
    $executeBool ? return $lend : return $executeBool;
  }

}