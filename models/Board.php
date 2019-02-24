<?php
//El modelo Tablero
class Board extends EntityBase{
  
    private $id, $position;

    
    public function __construct($adapter) {
        $table="boards";
        parent::__construct($table, $adapter);
    }
    
    //Los métodos get y set
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getPosition() {
        return $this->position;
    }

    public function setPosition($position) {
        $this->position = $position;
    }

    //Función para guardar una posición nueva en el tablero
    public function saveBoard(){
        $query="INSERT INTO boards (id,position)
                VALUES(NULL,'".$this->position."');";
        $save=$this->db()->query($query);
        return $save;
    }

    //Función para crear un tablero nuevo
    public function newBoard(){
        $query="DELETE FROM boards";
        $save=$this->db()->query($query);
        return $save;
    }



}
?>