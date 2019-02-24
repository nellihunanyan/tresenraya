<!DOCTYPE HTML>
<html lang="es">

<head>
<meta charset="utf-8"/>
<title>EL JUEGO TRES EN RAYA</title>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="libs/estilos.css">
</head>

<body > 
    
<?php 
/** 
* crear el array de bbdd, 
* ejemplo: $arr_posicion_jugador["12"]=X 
* que significa que el jugador X ha pulsado en la segunda casilla de la primera línea
*/
$arr_winner=array();
if(!empty($allPositions)){
    foreach($allPositions as $key => $value) {
        $arr=str_split($value->position); 
        $arr_posicion_jugador[$arr[0].$arr[1]]=$arr[2];

        //Aprovechando el bucle creamos otro array con los valores de la columna position
        array_push($arr_winner, $value->position);
    }
}
    
    
//Por defecto primero empieza el jugador X
$turn="X";

//Si ya hay jugadas, comprobar quien ha jugado el último y cambiar el turno a O si el último ha jugado el jugador X
if(!empty($getLastPosition[0]->position))
    {
        $arr_turn=str_split($getLastPosition[0]->position); 
        if($arr_turn[2]=="X")
            $turn="O";
    }
      

/**
 * Ver quién es el ganador
 * INICIO
 */
$winner="empate";

//Comprobar si el tablero está completo, entonces es el fin del juego
if((!empty($allPositions)) && (count($allPositions)==9))
    $endGame=true;
else
    $endGame=false;

   $letras=array("X","O");
   foreach($letras as $k=>$v)
   {
       // HORIZONTAL
       //I línea horizontal
       if((in_array('11'.$v, $arr_winner)) && (in_array('12'.$v, $arr_winner)) && (in_array('13'.$v, $arr_winner)))
       {
           $endGame=true;
           $winner=$v." I línea horizontal";
       }
       //II línea horizontal
       else if((in_array('21'.$v, $arr_winner)) && (in_array('22'.$v, $arr_winner)) && (in_array('23'.$v, $arr_winner)))
       {
           $endGame=true;
           $winner=$v." II línea horizontal";
       }
       //III línea horizontal
       else if((in_array('31'.$v, $arr_winner)) && (in_array('32'.$v, $arr_winner)) && (in_array('33'.$v, $arr_winner)))
       {
           $endGame=true;
           $winner=$v." III línea horizontal";
       }
   
       // VERTICAL
       //I línea vertical
       if((in_array('11'.$v, $arr_winner)) && (in_array('21'.$v, $arr_winner)) && (in_array('31'.$v, $arr_winner)))
       {
           $endGame=true;
           $winner=$v." I línea vertical";
       }
       //II línea vertical
       else if((in_array('12'.$v, $arr_winner)) && (in_array('22'.$v, $arr_winner)) && (in_array('32'.$v, $arr_winner)))
       {
           $endGame=true;
           $winner=$v." II línea vertical";
       }
       //III línea vertical
       else if((in_array('13'.$v, $arr_winner)) && (in_array('23'.$v, $arr_winner)) && (in_array('33'.$v, $arr_winner)))
       {
           $endGame=true;
           $winner=$v." III línea vertical";
       }
   
       // DIAGONAL 1
       if((in_array('11'.$v, $arr_winner)) && (in_array('22'.$v, $arr_winner)) && (in_array('33'.$v, $arr_winner)))
       {
           $endGame=true;
           $winner=$v." I diagonal";
       }
   
       // DIAGONAL 2
       if((in_array('31'.$v, $arr_winner)) && (in_array('22'.$v, $arr_winner)) && (in_array('13'.$v, $arr_winner)))
       {
           $endGame=true;
           $winner=$v." II diagonal";
       }       
   
   }
   
   
   
   ?>
     <?php 
    
     if($endGame)
     {
       if($winner=="empate")
           $message="<h3>¡EMPATE X y O!<h3><h6>Fin del juego</h6>";
       else
           $message="<h3>¡HA GANADO: ".$winner."!<h3><h6>Fin del juego</h6>";
     }
     else
       $message="<h4>Es el turno del jugador ".$turn."</h4><h6>Pulsar sobre la casilla deseada para jugar</h6>";
      
   
   
/**
* Ver quién es el ganador
* FIN
*/   
?> 

<!-- IMPRIMIR LA VISTA  -->
<div class="container">
    <div class="row">
        <!-- COLUMNA IZQUIERDA -->
        <div class="col-sm-7 col-sm-push-8">
            <div class="text-center">
            <div class="row text-center ">
                <div class="col-sm">  
                    <!-- ACCIÓN -->
                    <form action="<?php echo $helper->url("boards","play"); ?>" method="post" class="col-lg-5" name="00"><br>
                </div>
            </div>
    
            <!--  TABLERO -->
            <!-- Primera línea horizontal del tablero -->
            <div class="row" >
                <div class="col-sm">
                <button type="submit" name="position" value="11" <?php if((!empty($arr_posicion_jugador[11]) || $endGame)) echo "disabled";?>><?php echo @$arr_posicion_jugador[11]; ?></button>
                <button type="submit" name="position" value="12" <?php if((!empty($arr_posicion_jugador[12]) || $endGame)) echo "disabled";?>><?php echo @$arr_posicion_jugador[12]; ?></button>
                <button type="submit" name="position" value="13" <?php if((!empty($arr_posicion_jugador[13]) || $endGame)) echo "disabled";?>><?php echo @$arr_posicion_jugador[13]; ?></button>
                </div>
            </div>
    
            <!-- Segunda línea horizontal del tablero-->
            <div class="row">
                <div class="col-sm">
                <button type="submit" name="position" value="21" <?php if((!empty($arr_posicion_jugador[21]) || $endGame)) echo "disabled";?>><?php echo @$arr_posicion_jugador[21]; ?></button>
                <button type="submit" name="position" value="22" <?php if((!empty($arr_posicion_jugador[22]) || $endGame)) echo "disabled";?>><?php echo @$arr_posicion_jugador[22]; ?></button>
                <button type="submit" name="position" value="23" <?php if((!empty($arr_posicion_jugador[23]) || $endGame)) echo "disabled";?>><?php echo @$arr_posicion_jugador[23]; ?></button>
                </div>
            </div>
    
            <!-- Tercera línea horizontal del tablero-->
            <div class="row">
                <div class="col-sm">
                <button type="submit" name="position" value="31" <?php if((!empty($arr_posicion_jugador[31]) || $endGame)) echo "disabled";?>><?php echo @$arr_posicion_jugador[31]; ?></button>
                <button type="submit" name="position" value="32" <?php if((!empty($arr_posicion_jugador[32]) || $endGame)) echo "disabled";?>><?php echo @$arr_posicion_jugador[32]; ?></button>
                <button type="submit" name="position" value="33" <?php if((!empty($arr_posicion_jugador[33]) || $endGame)) echo "disabled";?>><?php echo @$arr_posicion_jugador[33]; ?></button>
                </div>
            </div>
        
        </div>        
        </div>

        <!-- COLUMNA DERECHA -->
        <div class="col-sm-5 col-sm-pull-4">
            <h4>TRES EN RAYA</h4>
            <!-- Imprimir instrucciones para el usuario -->
            <?PHP echo $message; ?>
            <!-- Botón para nuevo tablero -->
            <a class="btn btn-primary" href="<?php echo $helper->url("boards","newBoard"); ?>" >NUEVO TABLERO</a><br><br>
        </div>
    </div>
</div>
   
<footer class="col-lg-12">
    <hr/>
    <div class="footer-copyright text-center py-3">
        <p>El juego TRES EN RAYA</p>
        Copyright &copy; <?php echo  date("Y"); ?> Nelli Hunanyan
    </div>
</footer>

</body>
</html>