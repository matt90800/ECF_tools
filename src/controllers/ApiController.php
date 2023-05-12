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
}