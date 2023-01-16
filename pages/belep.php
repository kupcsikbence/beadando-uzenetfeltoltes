<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once('./kozos.php');

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
 
if (!$conn) {
    // Hiba a db csatlakozásnál
    die("Hiba a kapcsolódás során. Hibaüzenet: " . mysqli_connect_error());
}
else {
    // Csatlakozva a DB-hez

    // SQL parancs
    $sql = "SELECT * FROM felhasznalok WHERE felhasznalonev = '" . $_POST['username'] . "'";
    $res = mysqli_query($conn, $sql);
     
    if (mysqli_num_rows($res)>0) {
        // van ilyen nevű felhasználó
        while($sor = mysqli_fetch_assoc($res)) {
            if (password_verify($_POST['password'], $sor['jelszo'])) {
                // a jelszó egyezik a megadott jelszó HASH-jával

                // Beállítjuk a session-t
                $_SESSION['csaladinev'] = $sor['csaladinev'];
                $_SESSION['utonev'] = $sor['utonev'];
                $_SESSION['loginnev'] = $sor['felhasznalonev'];
                $_SESSION['id'] = $sor['id'];

                // átirányítjuk a főoldalra
                header('location: ' . APPROOT);
            }
        }
     
    } else {
        echo "Nem volt visszadott rekord";
    }
    
    // A kapcsolat lezárása
    mysqli_close($conn);
}

