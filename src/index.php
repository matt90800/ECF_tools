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

if (!empty($_GET)){
    $action = $_GET['action'];
    switch($action){
        case 'signin':
            ConnectionController::displaySignIn();
            if (isset($_POST['username'])&&isset($_POST['password'])){
                ConnectionController::logUser($_POST['username'], $_POST['password']);
            }
            break;
            case 'signup':
            ConnectionController::displaySignUp();
            if (
                isset($_POST['lastname']) &&
                isset($_POST['firstname']) &&
                isset($_POST['email'])&&
                isset($_POST['password']) ) {
                ConnectionController::createUser($_POST['lastname'], $_POST['firstname'], $_POST['email'],$_POST['password']);
            }
            break;
        case 'logout':
            ConnectionController::logOut();
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
        case 'update':
            
            
        case 'delete':
            ToolManager::deleteTool($_GET['object']);
            header("location:/");
  
        case 'show':
             if(!empty($_GET['id'])){
                $id = $_GET['id'];
                ToolController::displayTool($id);
            }
        default:

            break;
        }



} else {
    HomeController::displayHome();
}




