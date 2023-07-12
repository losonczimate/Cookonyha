<?php

        session_start();
        include "functions.php";
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
            <a href="index3.php"><img src="img/logo.png" width="90" height="90" title="Az oldal logó"/></a>
            <?php if (($_SESSION["loggedin"])) { ?>  

                <select name="headerlist" class="toggle-btn1">
                    <option value="none" selected>-</option>
                    <option value="Mai">Mai ajánlat</option>
                    <option value="heti">Heti ajánlatok</option>
                    <option value="havi">E havi ajánlatok</option>
                    <option value="all">Eddigi összes ajánlat</option>
                 </select>


                <button type="button" class="toggle-btn1" style="background-color: burlywood;"><a href="index4.php">Én is küldök be receptet</a></button>
                <button type="button" class="toggle-btn1"><a href="logout.php">Kilépés</a></button>

                <?php } else { ?> 
                <button type="button" class="toggle-btn1"><a href="index.php">Bejelentkezés</a></button>
                <button type="button" class="toggle-btn1"><a href="register.php">Regisztráció</a></button>

            
                <?php 
                echo "<u>Szerintem nem vagy <strong>bejelentkezve</strong>, a gombok segítségével elérheted céljaid.<u>" ;
            } ?>
        </nav><br/>
        <main>
        <?php if (($_SESSION["loggedin"])){?>
            <div class="oldalsav">
                <ul>
                <li><a href="index3.php">Főoldal</a></li>
                <li><a href="receptek.php">Receptek</a></li>
                <li><a href="rolunk.php">Rólunk</a></li>
                <li><a href="keszetel.php">Kész ételek</a></li>
                <li><a href="https://youtu.be/G1IbRujko-A">Fejlesztés alatt</a></li>
                <li><a href="">.</a></li>
                <li><a href="">...</a></li>
                <li><a href="">..</a></li>
                </ul>
            </div> 
        
        <fieldset class="mezocsoport">
            <legend style="font-size:larger">Recept beadása</legend>
            <form action="index4.php" method="POST" enctype="multipart/form-data">
            <label for="receptname">Recept neve:</label>
            <input type="text" id="receptname" name="receptname"/> <br/><br/>
            <label for="hozzavalok">Hozzávalók:</label>
            <textarea id="hozzavalok" name="hozzavalok"></textarea> <br/><br/>
            <label>Nehézségi foka:</label>
            <label for="op1">Könnyű</label>
            <input type="radio" id="op1" name="nehezseg[]" value="könnyű"/>
            <label for="op2">Közepes</label>
            <input type="radio" id="op2" name="nehezseg[]" value="közepes"/>
            <label for="op3">Nehéz</label>
            <input type="radio" id="op3" name="nehezseg[]" value="nehéz"/> <br/><br/>
            <label id="picture">Van róla egy fényképem: </label>
            <input type="file" name="picture" action="*/*"><br/><br/>
            <label id="bekuld">Küldés:</label>
            <input type="submit" name="submit-btn" id="bekuld"/><br/><br/>
            <label id="reset">Újrakezdeném</label> 
            <input type="reset" id="reset"><br/><br/>
            <input type="hidden">       
            </form>
        </fieldset>

        
        
     
        </main>
        <?php 
        if(isset($_SESSION["loggedin"])){
                  $txt = [
            
                "Recept" => $_POST["receptname"],
                "Hozzavalok" => $_POST["hozzavalok"], 
                "Nehézségi fok: " => $_POST["nehezseg"]
            ];
        }
        else{
         echo "Ehhez be kell jelentkezni." ;
        }
  
        
        if(isset($_POST["submit-btn"])){
                profilFeltoltes($_POST["receptname"]);
                recepttarol("arecept.txt",$txt);

        }
        ?>
        <?php } ?>
        <br/><br/>
        <?php include_once "footer.php"; ?>

</body>
</html>
