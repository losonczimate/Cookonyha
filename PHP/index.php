<?php 
        session_start();
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
      background-position: center;
      background-size: cover;">
  
      <div class="hero" >
          <div class="form-box2">
              <div class="button-box">
                  <div class="button-box">
                      <div id="btn"></div>
                      <button type="button" class="toggle-btn"><a href="index.php">Bejelentkezés</a></button>
                      <button type="button" class="toggle-btn"><a href="register.php">Regisztráció</a></button>
                  </div>
              </div>
              
                <form id="login" class="input-group" action="index.php" method="POST">
                    <input type="text" class="input-field" name="felhasznalonev" placeholder="Felhasználónév.." required>
                    <input type="password" class="input-field" name="jelszo" placeholder="Jelszó.." required>
                    Emlékezz rám <input type="checkbox" name="accept" class="check-box" />
                    <input type="submit" class="submit-btn" name="login" value="Bejelentkezés">


                    <input type="reset" class="submit-btn" value="Alaphelyzet">
                    
                </form>         
                
          </div>
      </div>

    <?php 
        include_once "login.php";
    ?>
</body>
</html>