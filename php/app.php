<?php

    $baseDatos=$_SESSION['bd'];#traemos todos los registros definidos para  el programa

    #aqui validamos si podemos pasar a la siguiente pregunta

    ValidarSiguientePreg();

    function ValidarSiguientePreg(){
        global $baseDatos;
        if ($_SESSION['siguientesPreguntas']) {
            $_SESSION["preguntaEscogida"]=array();
            if ($_SESSION["npregunta"]<count($baseDatos)) {   
                escogerPregunta($_SESSION["npregunta"]);
            }else{
                $_SESSION["npregunta"]=0;
                header("Location: fin_juego.php");
            }   
        }
    }

    #escogemos una pregunta segun la posicon elegida
    function escogerPregunta($n){
        global  $baseDatos,$preguntaView,$categoriaView,$respuestasView;
        
        $pregunta=$baseDatos[$n];

        $misRespuestas=array();

        array_push($misRespuestas,$pregunta['correcta']);
        for ($i=1; $i <= count($pregunta)-3; $i++) {
            array_push($misRespuestas,$pregunta['incorrecta' . $i]);
        }

        $_SESSION["preguntaEscogida"]["categoria"]=$pregunta["categoria"];
        $_SESSION["preguntaEscogida"]["pregunta"]=$pregunta["pregunta"];
        $_SESSION["preguntaEscogida"]["correcta"]=$pregunta["correcta"];
        $_SESSION["preguntaEscogida"]["respuestaAleatorias"]=desordenarRespuestas($misRespuestas);

    }

    #desordenar las respuestas de un pregunta
    function desordenarRespuestas($respuestas){
        $arr=$respuestas;
        shuffle($arr);
        return $arr;
    }

    #accion al oprimir boton
    function oprimirBTN(){
        global $baseDatos;
        if (isset($_POST['p0'])) {
            if ($_POST['p0']==$_SESSION["preguntaEscogida"]["correcta"]) {
                $_SESSION["acertadas"]=$_SESSION["acertadas"]+1;
                $_SESSION["puntajesCate"][$_SESSION["preguntaEscogida"]["categoria"]]+=1;
                continuarPregunta();
            }else{
                if ($_SESSION["nBonus"]<$_SESSION["bonus"]) {
                    header("Location: miniJuego/");
                }else{
                    continuarPregunta();
                }
            }

            if ($_SESSION["juego"]) {
                continuarPregunta();
            }
            ValidarSiguientePreg();
        }else{
            $_SESSION["siguientesPreguntas"]=false;
            escogerPregunta($_SESSION["npregunta"]);
        }
    }

    function continuarPregunta(){
        $_SESSION["siguientesPreguntas"]=true;
        $_SESSION["npregunta"]=$_SESSION["npregunta"]+1;
        $_SESSION["juego"]=false;
    }
?>