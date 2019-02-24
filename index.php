<?php
//Incluir la configuración global
require_once 'config/global.php';

//Incluir la base para los controladores que a su vez contiene las bases de entidad y modelo
require_once 'libs/ControllerBase.php';

//Funciones para el controlador frontal
require_once 'libs/ControllerFunctions.php';

//Cargamos controladores y acciones
if(isset($_GET["controller"])){
    $controllerObj=loadController($_GET["controller"]);
    launchAction($controllerObj);
}else{
    $controllerObj=loadController(DEFAULT_CONTROLLER);
    launchAction($controllerObj);
}
?>