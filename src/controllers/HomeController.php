<?php

class HomeController {

    static function displayHome(){
        $registerPart= UserController::displayLogPart();
        require_once('views/template/Home.php');
        
        foreach  (ToolManager::getTools() as $tool) {
            $image=$tool->getVisual();
            $name=$tool->getName();
            $id=$tool->getId();
            include('views/template/toolsCard.php');
        }

        require_once("./views/partials/Footer.php");
    }

    static function displayFilteredHome($filter){
        $registerPart= UserController::displayLogPart();
        require_once('views/template/Home.php');
        $found=false;
        foreach  (ToolManager::getTools() as $tool) {
            $image=$tool->getVisual();
            $name=$tool->getName();
            $description=$tool->getDescription();
            $category=$tool->getCategory()->getName();
            $id=$tool->getId();
            if (str_contains($name,$filter)||
                str_contains($description,$filter)||
                str_contains($category,$filter) ){
                    include('views/template/toolsCard.php');
                    $found=true;
                }
            }
            echo !$found ? "<p>Aucun contenu trouvé contenant ".$filter."</p>": "";

        require_once("./views/partials/Footer.php");
    }


}