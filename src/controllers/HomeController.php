<?php

class HomeController {

    static function displayHome(){
        $registerPart= ConnectionController::displayLogPart();
        require_once('views/template/Home.php');
        
        foreach  (ToolManager::getTools() as $tool) {
            $image=$tool->getVisual();
            $name=$tool->getName();
            $id=$tool->getId();
            include('views/template/toolsCard.php');
        }

        require_once("./views/partials/Footer.php");
    }


}