<?php

include "kozos.php";              

$fiokok= betoltoseaembernek("users.txt");
$uzenet = "";                   

$felhasznalonev= "";
$jelszo = "";

if (isset($_POST["login"])) {    
  if (!isset($_POST["felhasznalonev"]) || trim($_POST["felhasznalonev"]) === "" || !isset($_POST["jelszo"]) || trim($_POST["jelszo"]) === "") {
    
    $uzenet = "<strong>Hiba:</strong> Adj meg minden adatot!";
  } else 
    {
   
        $felhasznalonev = $_POST["felhasznalonev"];
        $jelszo = $_POST["jelszo"];

    
        $uzenet = "Sikertelen belépés! A belépési adatok nem megfelelők!";
    }  

    foreach ($fiokok as $fiok){              
      if ($fiok["felhasznalonev"] === $felhasznalonev && $fiok["jelszo"] === $jelszo) {
        $uzenet = "Sikeres belépés!";   
        $_SESSION["loggedin"]=TRUE;
        $_SESSION["user"]=$felhasznalonev;
        header ("Location: index3.php");   
                                     
      } else{
        echo "Sikertelen belépés!";
        break;

      }
    }  
  }

  
?>