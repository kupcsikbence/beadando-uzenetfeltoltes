<?php
require_once('./kozos.php');
?>

<div class="mt-5">
    <h1 class="text-center">Beérkezett üzenetek</h1>
</div>

<?php
$tartalom = array();

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
 
if (!$conn) {
    // Hiba a db csatlakozásnál
    die("Hiba a kapcsolódás során. Hibaüzenet: " . mysqli_connect_error());
}
else {
    // Csatlakozva a DB-hez

    // SQL parancs
    $sql = "SELECT uzenetek.emailcim, uzenetek.uzenet, uzenetek.felhasznalo, felhasznalok.csaladinev, felhasznalok.utonev, uzenetek.idopont FROM uzenetek LEFT JOIN felhasznalok ON felhasznalok.id = uzenetek.felhasznalo ORDER BY idopont DESC";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res)>0) {
        // már van üzenet
        while($sor = mysqli_fetch_assoc($res)) {
            array_push($tartalom, $sor);
        }
     
    } else {
        // még nincs üzenet.
    }
    
    // A kapcsolat lezárása
    mysqli_close($conn);
};
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-md-2">Felhasználó</th>
            <th class="col-md-8">Üzenet</th>
            <th class="col-md-2">Időpont</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($tartalom as $sor): ?>
            <tr>
                <td>
                    <?php 
                        if ($sor['felhasznalo'] == "") { 
                            echo "Vendég<br>"; 
                        }
                        else {
                            echo $sor['csaladinev'] . " " . $sor['utonev'] . "<br>";
                        }
                        echo $sor['emailcim'];
                    ?>
                </td>
                
                <td><?php echo $sor['uzenet']?></td>

                <td>
                    <?php
                        $date=date_create($sor['idopont']);
                        echo date_format($date, "Y.m.d. H:i:s"); 
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>

