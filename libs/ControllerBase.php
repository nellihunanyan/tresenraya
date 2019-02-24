<?php
//Clase base de la cual heredarán los controladores
class ControllerBase{

    public function __construct() {
		require_once 'Connect.php';
        require_once 'EntityBase.php';
        require_once 'ModelBase.php';
        
        //Incluir todos los modelos
        foreach(glob("models/*.php") as $file){
            require_once $file;
        }
    }
    
    //Método para crear una variable con el índice del array y asignarle el valor que tiene esa posición del array
    public function view($view,$data){
        foreach ($data as $id_assoc => $value) {
            ${$id_assoc}=$value; 
        }
        
        require_once 'libs/HelpViews.php';
        $helper=new HelpViews();
    
        require_once 'views/'.$view.'View.php';
    }
    
    //Método para redirigir los controladores y acciones
    public function redirect($controller=DEFAULT_CONTROLLER,$action=DEFAULT_ACTION){
        header("Location:index.php?controller=".$controller."&action=".$action);
    }
    
    

}
?>
