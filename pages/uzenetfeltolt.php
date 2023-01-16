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

    
    $uzenet = $_POST['uzenet'];

    // Ellenőrzések
    // 4. feladatpont: Az ellenőrzést végezze el szerveroldalon is (PHP).
    if (!empty($_POST["emailcim"])) {
        // van megadott emailcim

        // Ellenőrizzük, hogy valid-e az email
        if (filter_var($_POST["emailcim"], FILTER_VALIDATE_EMAIL)) {
            // Az emailcím jó.
            $emailcim = $_POST['emailcim'];
        
            // Van üzenet?
            if (!empty($_POST["uzenet"])) {
                // van.
                $uzenet = $_POST['uzenet'];
                
                // ha van felhasználó, akkor az ID-jét ebben tároljuk
                $felhasznalo = "";
                $sql = "";

                // bejelentkezett felhasználó?
                if(bejelentkezve()) {
                    $felhasznalo = $_SESSION['id'];
                
                    // SQL parancs
                    $sql = "INSERT INTO uzenetek (emailcim, uzenet, felhasznalo) VALUES ('" . $emailcim . "', '" . $uzenet . "', '" . $felhasznalo. "')";
                }
                else {
                    // SQL parancs
                    $sql = "INSERT INTO uzenetek (emailcim, uzenet) VALUES ('" . $emailcim . "', '" . $uzenet . "')";
                }

                // 4. feladatpont: Az elküldött Űrlap adatokat ezen kívül mentse le adatbázisba is. 
                // adatbázisba írás
                if (mysqli_query($conn, $sql)) {
                    // az adatbázisba írás sikerült

                    // 4. feladatpont: az e-mail küldése helyett jelenítse meg az adatokat egy új (ötödik) oldal tartalmaként.
                    megjelenit();
                } else {
                    echo "Hiba a beszúrás során";
                    echo mysqli_error($conn);
                    die;
                }

                // A kapcsolat lezárása
                mysqli_close($conn);
            } else {
                echo "Nincs üzenet.";
            }
        }
        else {
            echo "Nem valós emailcím!";
        }
    } else {
        echo "Az emailcim hiányzik!";
    }
}



function megjelenit() {
    require_once('./kozos.php');

    echo "<div class='my-5'>";
        echo "<h1 class='text-center mb-5'>Az alábbi üzenetet küldte el:</h1>";
    echo "</div>";

    echo "<div class='row'>";
        echo "<div class='col-md-3'>";
            if (bejelentkezve() ) { 
                echo "<strong>A feladat küldője: </strong>"; 
            }
            else {
                echo "<strong>A feladat küldője:</strong>"; 
            }
        echo "</div>";

        echo "<div class='col'>";
            if (bejelentkezve() ) { 
                echo $_SESSION['csaladinev'] . " " . $_SESSION['utonev']; 
            }
            else {
                echo "Vendég"; 
            }
        echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
        echo "<div class='col-md-3'>";
            echo "<strong>Email címe: </strong>"; 
        echo "</div>";

        echo "<div class='col'>";
            echo $_POST['emailcim']; 
        echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
        echo "<div class='col-md-3'>";
            echo "<strong>Az üzenet szövege: </strong>"; 
        echo "</div>";

        echo "<div class='col'>";
            echo $_POST['uzenet']; 
        echo "</div>";
    echo "</div>";
}