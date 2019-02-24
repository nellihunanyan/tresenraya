<?php
//Clase para realizar la conexión a la base de datos
class Connect{
    
    private $driver, $host, $user, $pass, $database, $charset;
  
    public function __construct() {
        $db_cfg = require_once 'config/database.php';
        $this->driver=$db_cfg["driver"];
        $this->host=$db_cfg["host"];
        $this->user=$db_cfg["user"];
        $this->pass=$db_cfg["pass"];
        $this->database=$db_cfg["database"];
        $this->charset=$db_cfg["charset"];
    }

    //Método para realizar la conexión a la base de datos
    public function connection(){
        
        if($this->driver=="mysql" || $this->driver==null){
            $con=new mysqli($this->host, $this->user, $this->pass, $this->database);
            $con->query("SET NAMES '".$this->charset."'");
        }
        return $con;
    }
    
}
?>