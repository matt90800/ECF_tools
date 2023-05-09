<?php

class Home {
    static function displayHome(){
        if (count($_SESSION) >0) {
            $registerPart=file_get_contents("./views/partials/Connected.php");
            $userName;
        } else {
            $registerPart=file_get_contents("./views/partials/RegisterPart.php");
        }
            
        require_once('views/template/Home.php');
        foreach  (GoodManager::getGoods() as $good) {
            $image=$good->getVisual();
            $name=$good->getName();
            $id=$good->getId();
            require_once('views/template/toolsCard.php');
        }

        require_once("./views/partials/Footer.php");
    }
}