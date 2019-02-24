<?php
//Clase para ayudas en las vistas
class HelpViews{
    
    //Método para devolver la URL completa pasando los parámetros
    public function url($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
        $urlString="index.php?controller=".$controlador."&action=".$accion;
        return $urlString;
    }
}
?>