<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once('./kozos.php');

// ha nem választott ki fájlt, csak megnyomta a feltöltés gombot
if (empty($_FILES)) {
    atiranyitas();
}

// a fájl most még átmenti helyen, átmeneti néven szerepel
$tmpfile = $_FILES['file']['tmp_name'];

// a fájl neve útvonal nélkül
$nev = basename($_FILES['file']['name']);

// a képek könyvtár útvonala
$utvonal = "../images";

// a feltölteni kívánt fájl kép?
if (substr($_FILES['file']['type'], 0, 5) == "image") {
    // a fájl HTTP POST metódussal került ide?
    if (is_uploaded_file($tmpfile)) {
        // ilyen névvel szerepel már fájl a könyvtárban?
        if (!file_exists($utvonal . "/" . $nev) ) {
            // a fájlt a helyére tesszük
            if (move_uploaded_file($tmpfile, $utvonal . "/" . $nev)) {
                echo "A feltöltés sikerült.";
                atiranyitas();
            }
            else {
                // a fájl nem került a helyére
                echo "A fájl nem került a helyére.";
                atiranyitas();
            }
        }
        else {
            // már szerepel ilyen nevű fájl a könyvtárban
            echo "Ezen a néven már szerepl fájl a könyvtárban.";
            atiranyitas();
        }
    }
    else {
        // nem POST-tal jött a file
        echo "Nem HTTP POST-tal lett feltöltve a fájl.";
        atiranyitas();
    }
}
else {
    // a feltölteni kívánt fájl nem kép   
    echo "A feltölteni kívánt fájl nem kép.s";
    atiranyitas(); 
}

function atiranyitas() {
    $parancs = "<script>let utvonal = '" . APPROOT . "/pages/kepek.php'; " . "location.replace(utvonal);</script>";
    echo $parancs;
}


