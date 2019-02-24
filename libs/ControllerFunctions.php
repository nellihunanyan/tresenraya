<?php
//Función para cargar el controlador
function loadController($controller){
    $controller=ucwords($controller).'Controller';
    $strFileController='controllers/'.$controller.'.php';
    
    if(!is_file($strFileController)){
        $strFileController='controllers/'.ucwords(DEFAULT_CONTROLLER).'Controller.php';   
    }
    
    require_once $strFileController;
    $controllerObj=new $controller();
    return $controllerObj;
}

//Función para cargar la acción
function loadAction($controllerObj,$action){
    $controllerObj->$action();
}

//Función para lanzar la acción
function launchAction($controllerObj){
    if(isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])){
        loadAction($controllerObj, $_GET["action"]);
    }else{
        loadAction($controllerObj, DEFAULT_ACTION);
    }
}

?>
