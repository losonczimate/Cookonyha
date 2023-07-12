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
          <div class="form-box">
              <div class="button-box">
                  <div class="button-box">
                      <div id="btn"></div>
                      <button type="button" class="toggle-btn"><a href="index.php">Bejelentkezés</a></button>
                      <button type="button" class="toggle-btn"><a href="register.php">Regisztráció</a></button>
                  </div>
                  
              </div>
              
                <form id="register" class="input-group" action="register.php" method="POST">
                    <input type="email" class="input-field" name="email" placeholder="E-mail cím.." required>
                    <input type="text" class="input-field" name="felhasznalonev" placeholder="Felhasználónév.." required>
                    <input type="password" minlength="8" maxlength="10" name="jelszo" class="input-field" placeholder="Jelszó.." required>
                    <input type="password" name="jelszo2" class="input-field" placeholder="jelszó ismét" required>
                    <label>Elfogadom a felhasználói feltételeket <input type="checkbox" name="accept" required></label>
                    
                    <input type="submit" class="submit-btn" name="regist" value="Regisztráció">
                    <input type="reset" class="submit-btn" value="Újrakezdem">
                    
                </form>  
        <?php  include_once "signup.php"; ?>
      </div>
        
    </div>
</body>
</html>