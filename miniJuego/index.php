<?php
    session_start();

    $_SESSION["imgMachine"]="img/rock.svg";
    $_SESSION["resultado"]="Seleccione una opcion...";
    $_SESSION["imgUser"]="img/rock.svg";
    $_SESSION["boton"]="Guardar Bonus para la proxima";
    $_SESSION["juego"]=false;

    header("Location: game.php")
?>