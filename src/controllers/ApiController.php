<?php
class ApiController{
    static function sendUserTool($id) {
        $tools=UserController::getTools($id);
        Api::sendTools($tools);
    }
    
    static function sendTools() {
        $tools=ToolManager::getAll();
        Api::sendTools($tools);
    }
    static function sendUsers() {
        $Users=UserManager::getAll();
        Api::sendUsers($Users);
    }

    static function sendLendTool($id){
        Api::sendBorrowByTool($id);
    }
}