<?php

class ToolController {

    static function displayTool(int $id){
        $registerPart= UserController::displayLogPart();
        require_once('views/template/Home.php');
        $tool = ToolManager::getById($id);
        $image=$tool->getVisual();
        $name=$tool->getName();
        $description=$tool->getDescription();
        $points=$tool->getPoints();
        $categoryName=$tool->getCategory()->getName();
        $user=$tool->getUser();
        $id=$tool->getId();
        include('views/template/toolCard.php');
        require_once("./views/partials/Footer.php");
    }

    static function displayToolCreationForm(){
        $registerPart= UserController::displayLogPart();
        require_once('views/template/Home.php');
        $categories="";
        foreach (CategoryManager::getAll() as $category ) {
            $categories = $categories."<option value=".$category->getId().">".$category->getName()."</option>";
        }
        $name="";
        $description="";
        $points=0;
        include('views/template/ToolManagmentForm.php');
        require_once("./views/partials/Footer.php");
    }

    static function createTool($name,$description,$points,$category,$user){
        $image = self::imageTransfert();
        $tool = new Tool(-1,$name,$image,$description,$points,CategoryManager::getById($category),UserManager::getById($user));
        ToolManager::add($tool);
    }

    private static function imageTransfert(){
        //on a validé la création avec l'image
        $image=null;
        //var_dump($_FILES);
        //télécharge l'image sur le serveur
            if(isset($_FILES['image'])){
                // Répertoire de destination pour enregistrer l'image
                $destination = "../images/";
                if (!is_dir($destination)) {
                    mkdir($destination);
                }
                $_FILES['image']['name']=str_replace(" ","_",$_FILES['image']['name']);
    
                // Nom du fichier sur le serveur (vous pouvez générer un nom unique si nécessaire)
                $nomFichier = $_FILES['image']['name'];
    
                // Chemin complet du fichier sur le serveur
                $cheminFichier = $destination . $nomFichier;    
                // Déplace le fichier téléchargé vers le répertoire de destination
                if (move_uploaded_file($_FILES['image']['tmp_name'], $cheminFichier)) {
                    $image = $cheminFichier;
                } else {
                    $image = null;
                }
            }
            return $image;
    }
    
    
            //update selectionné
    static function  displayUpdateWindow(){
        $tool=ToolManager::getById($_GET["object"]);
        $id=$tool->getId();
        $name=$tool->getName();
        $visual=$tool->getVisual();
        $description=$tool->getDescription();
        $points=$tool->getPoints();
        $category=$tool->getCategory();
        $user=$tool->getUser();
      //  $action="update";
        $registerPart= UserController::displayLogPart();
        require_once('views/template/Home.php');
        $categories="";
        foreach (CategoryManager::getAll() as $category ) {
            $categories = $categories."<option value=".$category->getId().">".$category->getName()."</option>";
        }

        include('views/template/ToolManagmentForm.php');
        require_once("./views/partials/Footer.php");
        //toolManager::update($tool); 
    }

    static function update($id,$name,$description,$points,$category,$user){
        $image = self::imageTransfert();
        var_dump($image);
        $tool = ToolManager::getById($id);
        $tool->setName($name);
        $tool->setVisual($image);
        $tool->setDescription($description);
        $tool->setPoints($points);
        $tool->setCategory(CategoryManager::getById($category));
       // $tool = new Tool(-1,$name,$image,$description,$points,CategoryManager::getById($category),UserManager::getById($user));
       var_dump( ToolManager::update($tool));
    }

    static function delete($id){
        ToolManager::delete($id);
    } 

    static function displayLendForm($id){
        $tool=ToolManager::getById($id);
        $id=$tool->getId();
        $name=$tool->getName();
        $visual=$tool->getVisual();
        $description=$tool->getDescription();
        $points=$tool->getPoints();
        $category=$tool->getCategory();
        $user=$tool->getUser();
      //  $action="update";
        $registerPart= UserController::displayLogPart();
        require_once('views/template/Home.php');
/*         $categories="";
        foreach (CategoryManager::getAll() as $category ) {
            $categories = $categories."<option value=".$category->getId().">".$category->getName()."</option>";
        } */

        include('views/template/Lend.php');
        require_once("./views/partials/Footer.php");
        //toolManager::update($tool); 
    }

    static function createLend($begining_date,$end_date,$borrower,$tool){
        $lend = new Lend(-1,$begining_date,$end_date,UserManager::getById($borrower),ToolManager::getById($tool));
        LendManager::add($tool);
    }

}