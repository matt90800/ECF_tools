<?php

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

echo '<pre>';
var_dump($_GET);
echo '</pre>';


echo '<pre>';
print_r($_POST);
echo '</pre>';

if (!empty($_GET)){
    $action = $_GET['action'];
    switch($action){
        case 'signin':
            Connection::displaySignIn();
            if (isset($_POST['username'])&&isset($_POST['password'])){
                UserManager::connectUser($_POST['username'], $_POST['password']);
            }
            break;
            case 'signup':
            Connection::displaySignUp();
            if (
                isset($_POST['lastname']) &&
                isset($_POST['firstname']) &&
                isset($_POST['email'])&&
                isset($_POST['password']) ) {
                UserManager::insertUser($_POST['lastname'], $_POST['firstname'], $_POST['email'],$_POST['password']);
            }
            break;
        case 'logout':
            //logout();
            break;
        case 'add':
            //addContact();
        case 'show':
/*             if(!empty($_GET['id'])){
                $id = $_GET['id'];
                showContact($id);
            }*/
        default:

            break;
        }
//} else if (!empty($_POST)){
//        $action = $_POST['action'];
//        var_dump($action);
//    switch($action){
//        case 'signin':
//            Connection::displaySignIn();
//            break;
//            case 'signup':
//            Connection::displaySignUp();
//            break;
//        case 'logout':
//            //logout();
//            break;
//        case 'add':
//            //addContact();
//        case 'show':
///*             if(!empty($_GET['id'])){
//                $id = $_GET['id'];
//                showContact($id);
//            }*/
//        default:

//            break;
//        }


//} else {
    Home::displayHome();
}




