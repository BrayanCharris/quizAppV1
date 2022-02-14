<?php
    session_start();

    require("php/app.php");
    
    if (isset($_POST['next'])) {
        oprimirBTN();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
    <link rel="stylesheet" href="css/gamePreg.css">
</head>
<body>
    <header>
        <h1>TRIVIA SENA</h1>
        <p>✨ RETA A TUS HABILIDADES CON ESTE PREGUNTADO Y DIVIERTETE ✨</p>
    </header>
    
    <h2>Cantidad acertada: <span id="resultado"><?php echo $_SESSION['acertadas']; ?></span></h2>
    
    <?php if(!$_SESSION['siguientesPreguntas']):?>
        <div class="alerta">--- DEBE SELECCIONAR UNA OPCION PARA CONTINUAR ---</div>
    <?php endif;?>

    <form action="" method="post" class="container">

        <section id="p0">
            <div class="encabezado">
                <div class="categoria" id="categoria"><?php echo $_SESSION["preguntaEscogida"]["categoria"];?></div>
            </div>
            <br>
            <h3><span></span><?php echo $_SESSION["preguntaEscogida"]["pregunta"];?></h3>

            <?php
                for ($i=0; $i < count($_SESSION["preguntaEscogida"]["respuestaAleatorias"]); $i++):
            ?>
            <label id="p0-<?php echo $i;?>"><input type="radio" value="<?php echo $_SESSION["preguntaEscogida"]["respuestaAleatorias"][$i];?>" name="p0" onclick="opcion('p0-<?php echo $i;?>')"><?php echo $_SESSION["preguntaEscogida"]["respuestaAleatorias"][$i];?></label>
            <?php endfor;?>
        </section>

        <button name="next">SIGUIENTE PREGUNTA --></button>
    
    </form>
</body>
<script>
    function opcion(seleccionado) {

        reiniciarBackgroundbtn(seleccionado);
        selectid(seleccionado).style.background="#ce865d";
    
    }

    function selectid(ID) {
        return document.getElementById(ID);
    }

    function reiniciarBackgroundbtn(valorID) {
        valores=valorID.split('-');
        for (let i = 0; i < 4; i++) {
            id=valores[0]+"-"+i;
            var idElementExist=!! document.getElementById(id);
            if (idElementExist) {
                selectid(id).style.background="transparent";
            }
        }
    }
</script>
</html>