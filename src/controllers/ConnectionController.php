<?php


class ConnectionController {

    public static function isSignedIn(){
        return count($_SESSION) >0;
    }
    static function displayLogPart(){
        if (self::isSignedIn()/* count($_SESSION) >0 */) {
            $userName=$_SESSION['user']['name'];
            return str_replace("USERNAME",$userName,file_get_contents("./views/partials/Connected.php"));
        } else {
            return file_get_contents("./views/partials/RegisterPart.php");
        }
    }

    static function displaySignIn(){
        $registerPart= ConnectionController::displayLogPart();
        require_once('views/template/Home.php');
        require_once('./views/template/SignIn.php');
        require_once("./views/partials/Footer.php");
    }
    static function displaySignUp(){
        $registerPart= ConnectionController::displayLogPart();
        require_once('views/template/Home.php');
        require_once('./views/template/SignUp.php');
        require_once("./views/partials/Footer.php");
    }

    static function createUser($lastName,$firstName,$email,$password){
        UserManager::insertUser($_POST['lastname'], $_POST['firstname'], $_POST['email'],$_POST['password']);
    }

    static function logUser($username,$password){
        $user = UserManager::connectUser($_POST['username'], $_POST['password']);
        header("location:index.php");
    }

    static function logOut(){
        UserManager::disconnectUser();
        header("location:index.php");

    }

}