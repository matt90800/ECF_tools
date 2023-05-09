<?php


class Connection {
    static function displaySignIn(){
        require_once('./views/template/SignIn.php');
    }
    static function displaySignUp(){
        require_once('./views/template/SignUp.php');
    }

    static function createUser($lastName,$firstName,$email,$password){
        UserManager::insertUser($_POST['lastname'], $_POST['firstname'], $_POST['email'],$_POST['password']);
    }

    static function logUser($username,$password){
        $user = UserManager::connectUser($_POST['pseudo'], $_POST['password']);
        header("location:index.php");
    }

    static function logOut(){
        UserManager::disconnectUser();
        header("location:index.php");

    }

}