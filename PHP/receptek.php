<?php 

session_start();
if(!isset($_SESSION["loggedin"])){
    $_SESSION["loggedin"]=FALSE;
}

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/remake.css"/>
    <title>Cookonyha</title>
</head>
<body style="    background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(img/background-image.jpg);
background-attachment: fixed;
background-repeat: no-repeat;
background-size:cover;"> 
        <header>
            <h1><i>Cookonyha</i></h1>
            <q>Akkor szereztem első ismereteimet a horrorról, amikor nem én főztem. /Alfred Hitchcock/</q>
        </header>
        <nav id="mydiv">
            <a href="index3.php"><img src="img/logo.png" width="100" height="100" title="Az oldal logó"/></a>
            <?php if (($_SESSION["loggedin"])) { ?>

                <select name="headerlist" size="1" class="toggle-btn1">
                    <option value="none" selected>-</option>
                    <option value="Mai">Mai ajánlat</option>
                    <option value="heti">Heti ajánlatok</option>
                    <option value="havi">E havi ajánlatok</option>
                    <option value="all">Eddigi összes ajánlat</option>
                 </select>


                <button type="button" class="toggle-btn1"><a href="index4.php">Én is küldök be receptet</a></button>
                <button type="button" class="toggle-btn1">Kilépés</button>
                <?php } else {    
                ?> 
                <button type="button" class="toggle-btn1"><a href="index.php">Bejelentkezés</a></button>
                <button type="button" class="toggle-btn1"><a href="register.php">Regisztráció</a></button>
                <?php 
                echo "<u>Szerintem nem vagy <strong>bejelentkezve</strong>, a gombok segítségével elérheted céljaid.<u>" ;
            } ?>
        </nav><br/>
        <?php if (($_SESSION["loggedin"])){?>
        <div class="oldalsav">
            <ul>
            <li><a href="index3.php">Főoldal</a></li>
            <li><a href="receptek.php" style="background-color: burlywood;">Receptek</a></li>
            <li><a href="rolunk.php">Rólunk</a></li>
            <li><a href="keszetel.php">Kész ételek</a></li>
            <li><a href="https://youtu.be/G1IbRujko-A">Fejlesztés alatt</a></li>
            <li><a href="">.</a></li>
            <li><a href="">...</a></li>
            <li><a href="">..</a></li>
            </ul>
        </div> 
        <?php } ?>
    
        <?php if(isset($_SESSION["loggedin"])){ ?>
        <div class="tejbegriz"><a href="tejbegriz.php"><img src="img/TG.jpg" width="100" height="100" title="Tejbegríz"/></a>
            <p class="t">A tejbegríz receptje.</p>
        </div>
        <aside  class="animation">
           
                <video controls width="500">
                    <source src="husi.mp4" type="video/mp4"/>
                    Ez a szöveg akkor jelenik meg, ha a böngésző nem támogatja a videóállományok beágyazását.
                </video>
        </aside>
        <?php } ?>

        <?php include "footer.php"; ?>
</body>
</html>