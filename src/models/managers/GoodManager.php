 <?php

/* require_once 'connect.php';
require_once './Models/Entities/Users.php';*/

class GoodManager{
 
  public static function addGood(Good $good) {
    $pdo = DatabaseConnection::getConnection();
    $sql = "INSERT INTO good (
      name, 
      visual, 
      description, 
      points, 
      id_category, 
      id_user) 
    VALUES (
      :name
      :visual
      :description
      :points
      :id_category
      :id_user)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $good->getName());
    $stmt->bindValue(':visual', $good->getVisual());
    $stmt->bindValue(':description', $good->getDescription());
    $stmt->bindValue(':points', $good->getPoints());
    $stmt->bindValue(':id_category', $good->getCategoryId());
    $stmt->bindValue(':id_user', $good->getUserId());
    $executeBool = $stmt->execute();
  //  $resultID=$pdo->lastInsertId();
    $good->setIdGood($pdo->lastInsertId());
    return $good;
  }

  public static function getGoods() {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM good";
    $goodArray = array();
    foreach  ($pdo->query($sql) as $row) {
      array_push(
        $goodArray,
          new Good(
            $row['id_good'],
            $row['name'],
            $row['visual'],
            $row['description'],
            $row['points'],
            $row['id_category'],
            $row['id_user']
          )
      );
    }
    return $goodArray;
  }

  public static function getGoodById(int $idGood) {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM good WHERE id_good= :idGood" ;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idGood', $idGood);
    $stmt->execute();
    $result = $stmt->fetch();
    //on ne peux pas utliser fetchClass avec un constructeur défini ??
    return $good = new Good(
        $row['id_good'],
        $row['name'],
        $row['visual'],
        $row['description'],
        $row['points'],
        $row['id_category'],
        $row['id_user']);
  }
  
  public static function getGoodByUser(int $idUser) {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM good WHERE id_user= :idUser" ;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_user', $idUser);
    $stmt->execute();
    $result = $stmt->fetch();
    //on ne peux pas utliser fetchClass avec un constructeur défini ??
    return $good = new Good(
        $row['id_good'],
        $row['name'],
        $row['visual'],
        $row['description'],
        $row['points'],
        $row['id_category'],
        $row['id_user']);
  }

  static function deleteGood(Good $good){
    $pdo = DatabaseConnection::getConnection();
    $sql="DELETE FROM good WHERE (id=:id)";
    $stmt = $pdo->prepare($sql);
    $id=$good->getIdGood();
    $stmt->bindParam(":id",$id);
    $executeBool = $stmt->execute();
    // $result=$stmt->fetchAll();
    //  self::$pdo=null;
    return $executeBool ? $good : $executeBool;
  }

}