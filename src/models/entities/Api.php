<?php
class Api{

    static function sendTools($tools){ 
        // Définir les en-têtes de réponse pour JSON
        header('Content-Type: application/json');
        $data = array();
        foreach ($tools as $tool ) {
        
        
            "id" => $tools["id"],
            "name" => $tools["name"],
            "visualName" => $tools["visual"],
            "descriptionName" => $tools["description"],
            "pointsName" => $tools["points"],
            "categoryId" => $tools["category"]["id"],
            "categoryName" => $tools["category"]["name"]
        
        // Convertir la liste d'utilisateurs en JSON
        $json = json_encode($data);
        
        // Envoyer la réponse JSON
        echo $json;
    }
}