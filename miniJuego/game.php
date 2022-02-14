<?php
    session_start();

    require("php/machine.php");

    /* var_export($_SESSION['preguntaEscogida']); */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piedra,Papel o Tijeras</title>
    <link rel="stylesheet" href="css/gameRPS.css"/>
</head>
<body>
    <div class="container">        
        <h1>Piedra,Papel o Tijeras</h1>

        <div class="infoGame">
            <p>Bonus: <?php echo $_SESSION["nBonus"]." / ".$_SESSION["bonus"];?></p>
            <form action="" method="post">
                <input type="submit" value="<?php echo $_SESSION["boton"];?>" class="btnNogame" name="exitGame">
            </form>
            
        </div>
        
        <div id="result">
            
            <img id="machine-img" src="<?php echo $_SESSION["imgMachine"];?>">
            
            <div id="start-text">
                <?php echo $_SESSION["resultado"];?>
            </div>
            
            <img id="user-img" src="<?php echo $_SESSION["imgUser"];?>">
            
        </div>
        
        <form action="" method="post">
            
            <div id="group-btn">
                <button id="rock" type="submit" name="roca">
                    <img src="img/rock.svg"/>
                </button>
                <button id="paper" type="submit" name="papel">
                    <img src="img/paper.svg"/>
                </button>
                <button id="scissors" type="submit" name="tijeras">
                    <img src="img/scissors.svg"/>
                </button>
            </div>
            
        </form>
        
        <footer>
            
        </footer>
            
        </div>
        <!-- <script src="app.js"></script> -->
    </body>
    </html>