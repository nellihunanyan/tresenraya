<?php
//Clase base que hereda de entidad base y de la cual heredarán los modelos
class ModelBase extends EntityBase{
    private $table;
     
    public function __construct($table, $adapter) {
        $this->table=(string) $table;
        parent::__construct($table, $adapter);
    }
    
    public function ejecuteSql($query){
        $query=$this->db()->query($query);
        if($query==true){
            if($query->num_rows>1){
                while($row = $query->fetch_object()) {
                   $resultSet[]=$row;
                }
            }elseif($query->num_rows==1){
                if($row = $query->fetch_object()) {
                    $resultSet=$row;
                }
            }else{
                $resultSet=true;
            }
        }else{
            $resultSet=false;
        }
        
        return $resultSet;
    }
    

}
?>


