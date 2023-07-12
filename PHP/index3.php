<?php 
 session_start();
 if(!isset($_SESSION["loggedin"])){
     $_SESSION["loggedin"]=FALSE;
 }


    $latogatasok=1;
 if (isset($_COOKIE["visits"])) {
   $latogatasok = $_COOKIE["visits"] + 1;  // az eddigi látogatások számát megnöveljük 1-gyel
 }

 // egy "visits" nevű süti a látogatásszám tárolására, amelynek élettartama 30 nap
 setcookie("visits", $latogatasok, time() + (60*60*24*30), "/");
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
                <button type="button" class="toggle-btn1"><a href="logout.php">Kilépés</a></button>


                <?php } else {    
                ?> 

                <button type="button" onclick="" class="toggle-btn1"><a href="index.php">Bejelentkezés</a></button>
                <button type="button" class="toggle-btn1"><a href="register.php">Regisztráció<a></button>

                
                <?php 
                echo "<u>Szerintem nem vagy <strong>bejelentkezve</strong>, a gombok segítségével elérheted céljaid.<u>" ;
            } ?>
               


            
        </nav><br/>
    <main>
    <div class="oldalsav">
    <?php if (($_SESSION["loggedin"])){?>
        <ul>
        <li><a href="index3.php" style="background-color: burlywood;">Főoldal</a></li>
        <li><a href="receptek.php">Receptek</a></li>
        <li><a href="rolunk.php">Rólunk</a></li>
        <li><a href="keszetel.php">Kész ételek</a></li>
        <li><a href="https://youtu.be/G1IbRujko-A">Fejlesztés alatt</a></li>
        <li><a href="">.</a></li>
        <li><a href="">...</a></li>
        <li><a href="">..</a></li>
        </ul>
        <?php } ?>
    </div> 

        <div class="szovegkozepen">
                <h1>Üdvözlünk az oldalunkon!</h1>
    <?php
      if ($latogatasok > 1) {     
        echo "Ez a(z) $latogatasok. látogatásod.";
      } else {                  
        echo "Ez az 1. látogatásod.";
      }?>
                <p> Ezen az oldalon <b>könnyű</b> és <b>egyszerűen</b> elkészíthető ételek receptjeit találhatod meg!</p>
                <p> Recept listánk folyamatosan bővül saját, illetve általatok megadott és elküldött receptekkel,
                    ha esetleg  is szeretnél Te is küldeni receptet kattints az "Én is küldök receptet"  gombra.
                    Receptek megnézéséért kattints a <mark>"Receptek"</mark> gombra.</p>

                <p><u>Kellemes sütést/főzést kívánunk!</u></p> 

                <p>Máté és Dani.</p> <br/>
                <p>U:i.:Főzés közben ne gondolkozzunk és a forró olaj, rossz ha a kezünkön van, nem a serpenyőben.</p>
            
        </div>

        
    </main>
    <div>
    <iframe src="https://www.mcdonalds.hu/" title="McDonald's"></iframe>
    </div>
        <?php include_once "footer.php"; ?>
</body>
</html>
