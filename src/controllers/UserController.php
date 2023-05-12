<?php


class UserController {

    public static function isSignedIn(){
        return count($_SESSION) >0;
    }
    static function displayLogPart(){
        if (self::isSignedIn()/* count($_SESSION) >0 */) {
            $userName=$_SESSION['user']['name'];
            return str_replace("USERNAME",$userName,file_get_contents("./views/partials/nav/Connected.php"));
        } else {
            return file_get_contents("./views/partials/nav/LogInSignIn.php");
        }
    }

    static function displaySignIn(){
        $registerPart= UserController::displayLogPart();
        require_once('views/template/Home.php');
        require_once('./views/template/SignIn.php');
        require_once("./views/partials/Footer.php");
    }
    static function displaySignUp(){
        $formName="sign up";
        $registerPart= UserController::displayLogPart();
        require_once('views/template/Home.php');
        require_once('./views/template/UserManagmentForm.php');
        require_once("./views/partials/Footer.php");
    }

    static function createUser($lastName,$firstName,$email,$password){
        UserManager::add($_POST['lastname'], $_POST['firstname'], $_POST['email'],$_POST['password']);
    }

    static function logUser($email,$password){
        $bool = UserManager::connectUser($email,$password);
        header("location:index.php");
    }

    static function logOut(){
        UserManager::disconnectUser();
        header("location:index.php");
    }
    
    static function showAccount($id, $includePath){
        $registerPart= UserController::displayLogPart();
        $user=UserManager::getById($id);
        $formName="Modifier";
        //$id=$user->getId();
        $pseudo=$user->getPseudo();
        $lastname=$user->getLastname();
        $firstname=$user->getFirstname();
        $password=$user->getPassword();
        $email=$user->getEmail();
        $points=$user->getEarnedPoints();
        $role=$user->getRole();
        $type=substr($includePath,strpos($includePath,'.',strlen($includePath)-5));
        print_r($user);

        require_once('views/template/Home.php');
        require_once('./views/template/Account.php');
        require_once("./views/partials/Footer.php");
    }

    static function getTools($userId){
        $toolList = ToolManager::getToolByUser($userId);
        $user=UserManager::getById($userId);
        $user->setTools($toolList);
        return $toolList;
    }

    static function updateUser($user,$pseudo,$lastname,$firstname,$email,$points){
        $user=UserManager::getById($user['id']);
        $user->setPseudo($pseudo);
        $user->setLastname($lastname);
        $user->setFirstname($firstname);
        $user->setEmail($email);
        $user->setEarnedPoints($points);
        UserManager::update($user);
    }
    

}