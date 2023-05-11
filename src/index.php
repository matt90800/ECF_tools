<?php

$devLog=!true;

// Autoloading des classes
function myAutoloader($class_name)
{
    $controller_file = 'controllers/' . $class_name . '.php';
    $entities = 'models/entities/' . $class_name . '.php';
    $managers = 'models/managers/' . $class_name . '.php';

    if (file_exists($controller_file)) {
        include_once $controller_file;
    } elseif (file_exists($entities)) {
        include_once $entities;
    } elseif (file_exists($managers)) {
        include_once $managers;
    }
}

// Enregistrez la fonction d'autoloading
spl_autoload_register('myAutoloader');

session_start()? "" : print("Connection echouée"); //on lance la session avec session
if ($devLog){
    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';
    
    echo '<pre>';
    var_dump($_GET);
    echo '</pre>';
    
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
}

function searchContacts ($filter){
    $filter=strtolower($filter);
    //controleur des vues, vue home par défaut
    foreach(ContactManager::readContacts() as $contact){
 
            $id= $contact->getId();
            $firstName= $contact->getFirstName();
            $lastName =  $contact->getLastName();
            $image=!empty($contact->getImage())? $contact->getImage(): "./images/no_image.bmp";
        if (str_contains(strtolower($firstName),$filter)||str_contains(strtolower($lastName),$filter))
            include("./views/templates/homeCard.php");
    }
}

if (!empty($_GET)){
    if(isset($_GET['action'])) {
        $action = $_GET['action'];
        switch($action){
            case 'signin':
                UserController::displaySignIn();
                if (isset($_POST['username'])&&isset($_POST['password'])){
                    UserController::logUser($_POST['username'], $_POST['password']);
                }
                break;
            case 'signup':
                UserController::displaySignUp();
                if (
                    isset($_POST['lastname']) &&
                    isset($_POST['firstname']) &&
                    isset($_POST['email'])&&
                    isset($_POST['password']) ) {
                    UserController::createUser($_POST['lastname'], $_POST['firstname'], $_POST['email'],$_POST['password']);
                }
                break;
            case 'logout':
                UserController::logOut();
                break;
            case 'create':
                ToolController::displayToolCreationForm();
                if (
                    isset($_POST['nom']) &&
                    isset($_POST['description']) &&
                    isset($_POST['points'])&&
                    isset($_POST['category']) ) {
                    ToolController::createTool(
                        $_POST['nom'], 
                        $_POST['description'],
                        $_POST['points'],
                        $_POST['category'],
                        $_SESSION['user']['id']
                        );
                }
                break;
            case 'update':
                ToolController::displayUpdateWindow();
                if (
                    isset($_POST['nom']) &&
                    isset($_POST['description']) &&
                    isset($_POST['points'])&&
                    isset($_POST['category']) ) {
                    ToolController::updateTool(
                        $_GET['object'],
                        $_POST['nom'], 
                        $_POST['description'],
                        $_POST['points'],
                        $_POST['category'],
                        $_SESSION['user']['id']
                        );
                }
                break;
            case 'delete':
                ToolController::delete($_GET['object']);
                header("location:/");
                break;
            case 'show':
                if(!empty($_GET['id'])){
                    $id = $_GET['id'];
                    ToolController::displayTool($id);
                }
                break;
            case 'account':
                
                if (
                    isset($_POST['lastname']) &&
                    isset($_POST['firstname']) &&
                    isset($_POST['pseudo'])&&
                    isset($_POST['email'])&&
                    isset($_POST['points']) ) {
                        UserController::updateUser(
                            $_SESSION['user'],
                            $_POST['pseudo'], 
                            $_POST['lastname'],
                            $_POST['firstname'],
                            $_POST['email'],
                            $_POST['points'],
                            $_SESSION['user']['id']
                        );
                } elseif (isset($_GET['tab'])){
                    $userId=$_SESSION['user']['id'];
                    UserController::showAccount($userId,null);
                    UserController::getTools($userId);

                } else
                    UserController::showAccount($_SESSION['user']['id'],"UserManagmentForm.php");   
                break;
            default:
    
                break;
            }
    } else if(isset($_GET['searchContent'])){
        HomeController::displayFilteredHome(strtolower($_GET['searchContent']));
    } 
} else {
    HomeController::displayHome();
}




