<?php 

// Autoloading des classes
spl_autoload_register(function ($class_name) {
    include 'controllers/'.$class_name . '.php';
   // include 'views/'.$class_name . '.php';
});



var_dump($_GET);
var_dump($_POST);
if (!empty($_GET)){
    $action = $_GET['action'];
    switch($action){
        case 'signin':
            Connection::displaySignIn();
            break;
            case 'signup':
            Connection::displaySignUp();
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
} else if (!empty($_POST)){


} else {
    Home::displayHome();
}




