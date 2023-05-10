 <?php

/* require_once 'connect.php';
require_once './Models/Entities/Users.php';*/

class CategoryManager{
 
  public static function addCategory(Category $category) {
    $pdo = DatabaseConnection::getConnection();
    $sql = "INSERT INTO category (name) VALUES (:name)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $category->getName());
    $executeBool = $stmt->execute();
    $category->setId($pdo->lastInsertId());
    return $category;
  }

  public static function getCategories() {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM category";
    $toolArray = array();
    foreach  ($pdo->query($sql) as $row) {
      array_push(
        $toolArray,
          self::createCategory($row)
      );
    }
    return $toolArray;
  }

  public static function getCategoryById(int $id) {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM category WHERE id= :id" ;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch();
    //on ne peux pas utliser fetchClass avec un constructeur défini ??
    return self::createCategory($result);
  }
  
  public static function getCategoryByUser(int $idUser) {
    $pdo = DatabaseConnection::getConnection();
    $sql = "SELECT * FROM category WHERE id_user= :idUser" ;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_user', $idUser);
    $stmt->execute();
    $result = $stmt->fetch();
    //on ne peux pas utliser fetchClass avec un constructeur défini ??
    return self::createCategory($result);
  }
  
  static function deletecategory(Category $category){
    $pdo = DatabaseConnection::getConnection();
    $sql="DELETE FROM category WHERE (id=:id)";
    $stmt = $pdo->prepare($sql);
    $id=$category->getId();
    $stmt->bindParam(":id",$id);
    $executeBool = $stmt->execute();
    // $result=$stmt->fetchAll();
    //  self::$pdo=null;
    return $executeBool ? $category : $executeBool;
  }

  private static function createCategory($array){
    return new Category(
      $array['id'],
      $array['name']
    );
  } 

}