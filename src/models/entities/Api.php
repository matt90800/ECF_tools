<?php
class Api{

    static function sendTools($tools){ 

        // Définir les en-têtes de réponse pour JSON
       header('Content-Type: application/json');
      // header("Location: ../api");
       $data=array();
       $i=0;
       foreach ($tools as $tool) {
            $i++;
            array_push($data,self::decodeTool($tool));
       }

       // Convertir la liste d'utilisateurs en JSON
       $data = array(
        'response' => $data,
        'number' => $i
    );
       $json = json_encode($data,JSON_PRETTY_PRINT);

         // Envoyer la réponse JSON
        echo $json;
    }

    static function decodeTool($tool){
        $category=$tool->getCategory();
        return array(
            "id" => $tool->getId(),
            "name" => $tool->getName(),
            "visual" => $tool->getVisual(),
            "description" => $tool->getDescription(),
            "points" => $tool->getPoints(),
            "categoryId" => $category->getId(),
            "categoryName" => $category->getName(),
        );
    }
}