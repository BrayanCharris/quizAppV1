<?php
    require "php/definirInfo.php";

    session_start();

    $_SESSION["siguientesPreguntas"]=true;#indicamos que se puede pasar al siguiente grupo de preguntas
    $_SESSION["npregunta"]=0;#indicamos que se puede pasar al siguiente grupo de preguntas
    $_SESSION["preguntaEscogida"]=array();#aqui guardaremos las posiciones escogidas para poder validar que se completaron las preguntas y montar estas posiciones a la variable global y saber que no se debe repetir la pregunta
    $_SESSION["nBonus"]=0;#Cantidas de bonus usados
    $_SESSION["juego"]=false;#Esto es para saber si en el miniJuego ya participo y no vuelva a hacerlo

    header("Location:inicio.php");
?>