<?php

    function profilFeltoltes($receptneve) {
    global $hibakod;

    if (isset($_FILES["picture"]) && is_uploaded_file($_FILES["picture"]["tmp_name"])) {
        $engedelyezett_kiterjesztes = ["png", "jpg", "jpeg"];
        $kiterjesztes = strtolower(pathinfo($_FILES["picture"]["name"], PATHINFO_EXTENSION));

        if (in_array($kiterjesztes, $engedelyezett_kiterjesztes)) {
            if ($_FILES["picture"]["error"] === 0) {
                if ($_FILES["picture"]["size"] <= 8000000) {
                    $path = "feltoltott/" . $receptneve . "." . $kiterjesztes;

                    if (!move_uploaded_file($_FILES["picture"]["tmp_name"], $path)) {
                        $hibakod = "A fájl átmozgatása nem sikerült!";
                    }
                } else {
                    $hibakod = "A fájl mérete túl nagy!";
                }
            } else {
                $hibakod = "A fájlfeltöltés nem sikerült!";
            }
        } else {
            $hibakod = "A fájl kiterjesztése nem megfelelő!";
        }
    }
}
function receptolvas($fileopen) {
    $users = [];

    $file = fopen($fileopen, "r");
    if ($file === FALSE) {
        die("HIBA: A fájl megnyitása nem sikerült!");
    }
    while (($line = fgets($file)) !== FALSE) {
        $user = unserialize($line);
        $users[] = $user;
    }

    fclose($file);
    return $users;
}



function recepttarol($fileopen, $users) {
    $file = fopen($fileopen, "a");
    if ($file === FALSE) {
        die("HIBA: A fájl megnyitása nem sikerült!");
    }
   
        $open_user = serialize($users);
        fwrite($file, $open_user . PHP_EOL );

    fclose($file);
}
?>