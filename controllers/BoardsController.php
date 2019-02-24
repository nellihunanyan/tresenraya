<?php
//El controlador tablero
class BoardsController extends ControllerBase{
    public $connect;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->connect=new Connect();
        $this->adapter=$this->connect->connection();
    }
    
    //Acción índice 
    public function index(){
        
        //Crear el objeto tablero
        $board=new Board($this->adapter);
        
        //Conseguir todas las posiciones del tablero
        $allPositions=$board->getAll();

        //Conseguir la última posición pulsada en el tablero
        $getLastPosition=$board->getLast();
        
        //Cargar la vista index y pasarle valores
        $this->view("index",array("allPositions"=>$allPositions, "getLastPosition"=>$getLastPosition));
    }
    
    //Acción play: al pulsar la casilla decide de quién era el turno y guarda la posición en el tablero
    public function play(){

            //Crear el objeto tablero
            $board=new Board($this->adapter);
            $allPositions=$board->getAll();
            
            //Decidir de quién es el turno (X u O)
            //Primero empieza X
            if(empty($allPositions))
                $turn="X";
            else if(((count($allPositions))%2==0))
                $turn="X";
            else
                $turn="O";
            
            $player=$_POST["position"].$turn;
            
            $board->setPosition($player);
            $save=$board->saveBoard();
        
        $this->redirect("Boards", "index");
    }


    public function newBoard(){
    
            $board=new Board($this->adapter);
            $board->newBoard(); 
       
        $this->redirect();
    }
    


}
?>
