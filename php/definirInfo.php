<?php
    session_start();    

    $jsonPreguntas=array(
        array(
            "categoria"=>"PHP",
            "pregunta"=>"¿Cuál es la diferencia entre las funciones include() y require()?",
            "correcta"=>"Incluir un archivo específico",
            "incorrecta1"=>"Importar una libreria",
            "incorrecta2"=>"Incluir un metodo",
            "incorrecta3"=>"Ninguna de las anteriores"
        ),
        array(
            "categoria"=>"SISTEMA OPERATIVO",
            "pregunta"=>"¿Cuál es la distribución de Linux más usada?",
            "correcta"=>"Ubuntu",
            "incorrecta1"=>"Debian",
            "incorrecta2"=>"Fedora",
            "incorrecta3"=>"Mint"
        ),
        array(
            "categoria"=>"PYTHON",
            "pregunta"=>"¿Como se imprime en pyhton?",
            "correcta"=>"print",
            "incorrecta1"=>"system.out.print()",
            "incorrecta2"=>"cosole.log()",
            "incorrecta3"=>"echo"
        ),
        array(
            "categoria"=>"WEB",
            "pregunta"=>"¿html es un lenguaje de programacion?",
            "correcta"=>"false",
            "incorrecta1"=>"true"
        ),
        array(
            "categoria"=>"PYTHON",
            "pregunta"=>"¿cual es el valor nulo en python?",
            "correcta"=>"none",
            "incorrecta1"=>"null",
            "incorrecta2"=>"nulo"
        ),array(
            "categoria"=>"JAVASCRIPT",
            "pregunta"=>"¿Qué empresa desarrolló JavaScript?",
            "correcta"=>"Netscape ",
            "incorrecta1"=>"Google",
            "incorrecta2"=>"Amazon",
            "incorrecta3"=>"OAK"
        ),
        array(
            "categoria"=>"WEB",
            "pregunta"=>"¿como se declara la etiqueta para enlazar en HTML?",
            "correcta"=>"a",
            "incorrecta1"=>"p",
            "incorrecta2"=>"img",
            "incorrecta3"=>"article"
        ),
        array(
            "categoria"=>"PHP",
            "pregunta"=>"¿Que hace el metodo POST Y GET?",
            "correcta"=>"Metodo para enviar la informacion",
            "incorrecta1"=>"Metodo para cargar una imagen",
            "incorrecta2"=>"Mandar informacion a la Base de Datos"
        )
    );

    require("php/Cargar_categorias.php");

    $_SESSION["bd"]=$jsonPreguntas;
    $_SESSION["acertadas"]=0;
    $_SESSION["puntajesCate"]=cargarCategorias($jsonPreguntas);
    $_SESSION["bonus"]=round(count($jsonPreguntas)*0.4);
    $_SESSION["cantRepCategoria"]=cargarCantidasCategorias($jsonPreguntas);

?>