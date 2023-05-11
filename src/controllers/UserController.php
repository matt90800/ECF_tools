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
    
    static function showAccount($id, $userFormPath){
        $registerPart= UserController::displayLogPart();
        $user=UserManager::getUserById($id);
        $formName="Modifier";
        $id=$user->getId();
        $pseudo=$user->getPseudo();
        $lastname=$user->getLastname();
        $firstname=$user->getFirstname();
        $password=$user->getPassword();
        $email=$user->getEmail();
        $points=$user->getEarnedPoints();
        $role=$user->getRole();
        require_once('views/template/Home.php');
        require_once('./views/template/Account.php');
        require_once("./views/partials/Footer.php");
    }

    static function getTools($userId){
        $toolList = ToolManager::getToolByUser($userId);
        $user=UserManager::getUserById($userId);
        $user->setTools($toolList);
        echo '<pre>';
        print_r($user);
        echo '</pre>';
        
    }

    static function updateUser($user,$pseudo,$lastname,$firstname,$email,$points){
        $user=UserManager::getUserById($user['id']);
        $user->setPseudo($pseudo);
        $user->setLastname($lastname);
        $user->setFirstname($firstname);
        $user->setEmail($email);
        $user->setEarnedPoints($points);
        UserManager::updateUser($user);
    }
    

}