<?php

    $ROCK = "rock";
    $PAPER = "paper";
    $SCISSORS = "scissors";

    $EMPATO = 0;
    $GANO = 1;
    $PERDIO = 2;

    if (isset($_POST['exitGame'])) {
        $_SESSION["siguientesPreguntas"]=true;
        $_SESSION["npregunta"]=$_SESSION["npregunta"]+1;
        header("Location: ../game.php");
    }
    
    if (isset($_POST['roca'])) {
        play($ROCK);
    }elseif (isset($_POST['papel'])) {
        play($PAPER);
    }else if(isset($_POST['tijeras'])){
        play($SCISSORS);
    }
    function play($opcionJugador){
        global $ROCK,$PAPER,$SCISSORS,$EMPATO,$GANO,$PERDIO;

        if (!$_SESSION["juego"]) {
            if ($ROCK==$opcionJugador) {
                $_SESSION["imgUser"]="img/rock.svg";
            }else if($PAPER==$opcionJugador){
                $_SESSION["imgUser"]="img/paper.svg";
            }elseif ($SCISSORS==$opcionJugador) {
                $_SESSION["imgUser"]="img/scissors.svg";
            }
    
            sleep(1);
    
            $opcMaquina=calcMachine();
    
            $_SESSION["imgMachine"]="img/".$opcMaquina.".svg";
    
            $resultadoJuego=calcResult($opcionJugador,$opcMaquina);
    
            if ($resultadoJuego==$EMPATO) {
                $_SESSION["resultado"]="Tenemos un empate,Suerte para la proxima!";
            }else if ($resultadoJuego==$GANO) {
                $_SESSION["resultado"]="Ganaste,Felicitaciones...!";
                $_SESSION["acertadas"]=$_SESSION["acertadas"]+1;
                $_SESSION["puntajesCate"][$_SESSION["preguntaEscogida"]["categoria"]]+=1;
                $_SESSION["nBonus"]=$_SESSION["nBonus"]+1;
            }else if ($resultadoJuego==$PERDIO) {
                $_SESSION["resultado"]="Perdiste,para la proxima...!";
                $_SESSION["nBonus"]=$_SESSION["nBonus"]+1;
            }

            $_SESSION["boton"]="volver al test";
            $_SESSION["juego"]=true;            
        }

    }

    function calcMachine(){
        global $ROCK,$PAPER,$SCISSORS;
        $number=rand(1,3);
        if ($number==1) {
            return $PAPER;
        } else if($number==2){
            return $ROCK;
        } else if($number==3){
            return $SCISSORS;
        }
        
    }

    function calcResult($userOption,$machineOption){
        global $ROCK,$PAPER,$SCISSORS,$EMPATO,$GANO,$PERDIO;
        if ($userOption==$machineOption) {
            return $EMPATO;
        }elseif ($userOption==$ROCK) {
            
            if ($machineOption==$PAPER) {return $PERDIO;} 
            else if($machineOption==$SCISSORS) {return $GANO;}
            
        }elseif ($userOption==$PAPER) {

            if ($machineOption==$SCISSORS) {return $PERDIO;} 
            else if($machineOption==$ROCK) {return $GANO;}

        }elseif ($userOption==$SCISSORS) {

            if ($machineOption==$ROCK) {return $PERDIO;} 
            else if($machineOption==$PAPER) {return $GANO;}

        }
    }
?>