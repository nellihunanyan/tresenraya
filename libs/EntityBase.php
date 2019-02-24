<?php
//Clase base de la cual heredarán los modelos
class EntityBase{
    private $table;
    private $db;
    private $connect;

    public function __construct($table, $adapter) {
        $this->table=(string) $table;
        
		/*
        require_once 'Connect.php';
        $this->connect=new Connect();
        $this->db=$this->connect->connection();
		 */
		$this->connect = null;
		$this->db = $adapter;
    }
    
    //Método para conectarse a la base de datos
    public function getConnect(){
        return $this->connect;
    }
    
    public function db(){
        return $this->db;
    }
    
    //Método para devolver todos los registros de la tabla ordenados por id
    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY id DESC");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
       
        if(isset($resultSet))
            return $resultSet;
        else
            return false;
    }

    //Método para devolver el último registro
    public function getLast(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY id DESC limit 1");
  
        while ($row = $query->fetch_object()) {
            $resultSet[]=$row;
         }
        
         if(isset($resultSet))
             return $resultSet;
         else
             return false;
    }
    
    //Método para devolver el registro con la id 
    public function getById($id){
        $query=$this->db->query("SELECT * FROM $this->table WHERE id=$id");

        if($row = $query->fetch_object()) {
           $resultSet=$row;
        }
        
        return $resultSet;
    }
    
    //Método para devolver todos los registros donde la columna indicada tiene el valor indicado
    public function getBy($column,$value){
        $query=$this->db->query("SELECT * FROM $this->table WHERE $column='$value'");

        while($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }
    
    //Método para eliminar el registro con la id 
    public function deleteById($id){
        $query=$this->db->query("DELETE FROM $this->table WHERE id=$id"); 
        return $query;
    }
    
    //Método para eliminar el registro donde la columna indicada tiene el valor indicado
    public function deleteBy($column,$value){
        $query=$this->db->query("DELETE FROM $this->table WHERE $column='$value'"); 
        return $query;
    }  
 
}
?>
