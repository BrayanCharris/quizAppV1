<?php 
    session_start();
    require("php/Cargar_categorias.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/PuntajesUser.css">
</head>
<body>
        <div class="cuadro">

            <h1>Juego Terminado...</h1>

            <p>Acertadas: <?php echo $_SESSION['acertadas']." / ".count($_SESSION['bd']);?> </p>

            <div class="puntajeCate">
                <?php foreach ($_SESSION["puntajesCate"] as $key => $value):?>
                    <p><?php echo $key;?> : <?php echo ($value/$_SESSION["cantRepCategoria"][$key])*100;?>%</p>
                <?php endforeach;?>
            </div>

            <p>Bonus Usados: <?php echo $_SESSION["nBonus"]." / ".$_SESSION["bonus"];?></p>

            <p>Tu puntaje total fue : <?php echo round(($_SESSION['acertadas']/count($_SESSION['bd']))*100);?>%</p>

            <a href="index.php">Reiniciar el juego</a>

        </div>
</body>
</html>