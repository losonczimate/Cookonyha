<?php
 $email = "";
 $user = "";
 $pass1 = "";
 $pass2 = "";
 
 $hibak = [];
 
 include "kozos.php";       
 
 $fiokok = betoltoseaembernek("users.txt"); 
 
     if (isset($_POST["regist"])) { 
       
       $email = $_POST["email"];
       $user = $_POST["felhasznalonev"];
       $pass1 = $_POST["jelszo"];
       $pass2 = $_POST["jelszo2"];
       $felt = 0;
 
         foreach ($fiokok as $fiok) {
           if ($fiok["felhasznalonev"] === $user){
             $hibak[] = "A felhasználónév már foglalt!";
               }
             }
 
 /*if (!isset($_POST["felhasznalonev"]) || trim($_POST["felhasznalonev"]) === "")
   $hibak[] = "A felhasználónév megadása kötelező!";*/
 
 if (!isset($_POST["jelszo"]) || trim($_POST["jelszo"]) === "")
   $hibak[] = "A jelszó megadása kötelező!";
 
 if(!isset($_POST["email"]) || trim($_POST["email"]) === "")
     $hibak[]="E-mail megadása kötelező!";
 
 if($pass1 !== $pass2){
       $hibak[] = "A két jelszó nem egyezik!";
 }
 
 if(isset($_POST["accept"])){
     $felt++;
 }
 
 if($felt !=1){
     $hibak[] = "El kell fogadni a felhasználási feltételeket!";
 }
 
 if (strlen($pass1) < 8)
   $hibak[] = "A jelszónak legalább 8 karakter hosszúnak kell lennie!";
 
        if (count($hibak) === 0) {   
          
                $fiokok[] = ['felhasznalonev' => $user, 'jelszo' => $pass1, 'emailcim' => $email];
          
               felhmentes("users.txt", $fiokok);
              header("Location: index.php");
        } else {
            foreach($hibak as $hiba){
              echo $hiba . "<br>";
        }
  } 
}
   
?>