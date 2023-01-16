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
    // a jelszó helyett a jelszó HASH kódját tároljuk el
    // bármi más használható, ami biztonságos, pl. SHA..
    $sql = "INSERT INTO felhasznalok (csaladinev, utonev, felhasznalonev, jelszo) VALUES ('" . $_POST['csaladinev'] . "', '" . $_POST['utonev'] . "', '" . $_POST['felhasznalonev']. "', '" . password_hash($_POST['password1'], PASSWORD_DEFAULT) . "')";

    if (mysqli_query($conn, $sql)) {
        // A regisztráció sikerült
        // 6.d) Regisztrációkor nem léptetjük be automatikusan a felhasználót.
        // ezért csak visszairányítjuk a bejelentkezés oldalra
        header('location: ' . APPROOT);

    } else {
        echo "Hiba a beszúrás során";
        echo mysqli_error($conn);
        die;
    }

    // A kapcsolat lezárása
    mysqli_close($conn);
}

