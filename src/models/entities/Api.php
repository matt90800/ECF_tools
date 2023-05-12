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

    static function sendUsers($Users){ 

        // Définir les en-têtes de réponse pour JSON
       header('Content-Type: application/json');
      // header("Location: ../api");
       $data=array();
       $i=0;
       foreach ($Users as $user) {
            $i++;
            array_push($data,self::decodeUser($user));
       }

       // Convertir la liste d'utilisateurs en JSON
       $data = array(
        'password' => 'test',
        'user_number' => $i,
        'response' => $data
    );
       $json = json_encode($data,JSON_PRETTY_PRINT);

         // Envoyer la réponse JSON
        echo $json;
    }

    static function sendBorrowByTool($toolId){

        $lends = LendManager::getAllByTool($toolId);
        // Définir les en-têtes de réponse pour JSON
        header('Content-Type: application/json');
        // header("Location: ../api");
        $data=array();
        $i=0;
        foreach ($lends as $lend) {
            $i++;
            array_push($data,self::decodeBorrow($lend));
        }

        // Convertir la liste d'utilisateurs en JSON
        $data = array(
        'borrow_number' => $i,
        'response' => $data
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

    static function decodeUser($user){
        return array(
            "id" => $user->getId(),
            "email" => $user->getEmail(),
            "psw" => $user->getPassword(),
            "pseudo" => $user->getPseudo(),
            "lastname" => $user->getLastname(),
            "firstname" => $user->getFirstname(),
            "points" => $user->getEarnedPoints(),
            "id_role" => $user->getRole()->getId(),
            "name_role" => $user->getRole()->getName()
        );
    }

    static function decodeBorrow($borrow){
        $user = $borrow->getUser();
        $tool = $borrow->getTool();
        return array(
            "id" => $borrow->getId(),
            "begining_date" => $borrow->getBeginingDate(),
            "end_date" => $borrow->getEndDate(),
            "id_users" => $user->getId(),
            "name_users" => $user->getPseudo(),
            "id_tool" => $tool->getId(),
            "name_tool" => $tool->getName(),
        );
    }

}