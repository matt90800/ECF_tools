<?php

class ToolController {
    static function displayTool(int $id){

        $registerPart= ConnectionController::displayLogPart();
        require_once('views/template/Home.php');
        $tool = ToolManager::getToolById($id);
        $image=$tool->getVisual();
        $name=$tool->getName();
        $description=$tool->getDescription();
        $points=$tool->getPoints();
        $idCategory=$tool->getidCaTegory();
        $idUser=$tool->getIdUser();
        $id=$tool->getId();
        include('views/template/toolCard.php');
    

        require_once("./views/partials/Footer.php");
    }

    static function displayToolCreationForm(){
        $registerPart= ConnectionController::displayLogPart();
        require_once('views/template/Home.php');
        $categories="";
        foreach (CategoryManager::getCategories() as $category ) {
            $categories = $categories."<option value=".$category->getId().">".$category->getName()."</option>";
        }
        include('views/template/add.php');
        require_once("./views/partials/Footer.php");

    }
    static function createTool($name,$description,$points,$category,$user){
        $image = self::imageTransfert();
        $tool = new Tool(-1,$name,$image,$description,$points,$category,$user);
        ToolManager::addTool($tool);
    }

    private static function imageTransfert(){
        //on a validé la création avec l'image
        $image=null;
        var_dump($_FILES);
        //télécharge l'image sur le serveur
            if(isset($_FILES['image'])){
                // Répertoire de destination pour enregistrer l'image
                $destination = "../images/";
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
    function displayUpdateWindow(){
        $contact=ContactManager::readContactById($_POST["id"]);
        $id=$contact->getId();
        $lastName=$contact->getLastName();
        $firstName=$contact->getFirstName();
        $email=$contact->getEmail();
        $phone=$contact->getPhone();
        $birthDate=$contact->getBirthDate();
        $action="update";
        include("./views/templates/contactForm.php");
        //ContactManager::updateContact($contact); 
    }

    static function delete(){
        ToolManager::deleteTool($id);
    } 

}