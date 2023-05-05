<?php


class Connection {
    static function displaySignIn(){
        require_once('./views/template/SignIn.php');
    }
    static function displaySignUp(){
        require_once('./views/template/SignUp.php');
    }

    static function logUser(){
            $user = UserManager::connectUser($_POST['pseudo'], $_POST['password']);
    }

}