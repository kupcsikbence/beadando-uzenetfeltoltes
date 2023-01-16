<?php
require_once('./kozos.php');

/*
 * 6.c) A „Belépés” menüpontra kattintva feljön egy oldal, ahol lehet bejelentkezni vagy regisztrálni.
*/

?>

<div class="wrapper-login mt-5">
    <h2 class="text-center mb-5">Regisztráció</h5>

    <form action="./regisztral.php" method ="POST">

        <div class="mb-3 col-8 rounded mx-auto">
            <label for="id-csaladinev">Családi név</label>
            <input type="text" class="form-control" id="id-csaladinev" placeholder="" name="csaladinev" autocomplete="off">
        </div>

        <div class="mb-3 col-8 rounded mx-auto">
            <label for="id-utonev">Utónév</label>
            <input type="text" class="form-control" id="id-utonev" placeholder="" name="utonev" autocomplete="off">
        </div>

        <div class="mb-3 col-8 rounded mx-auto">
            <label for="id-user">Felhasználónév</label>
            <input type="text" class="form-control" id="id-user" placeholder="" name="felhasznalonev" autocomplete="off">
        </div>

        <div class="mb-3 col-8 rounded mx-auto">
            <label for="id-password">Jelszó</label>
            <input type="password" class="form-control" id="id-password1" placeholder="" name="password1">
        </div>

        <div class="mb-3 col-8 rounded mx-auto">
            <label for="id-password">Jelszó ismét</label>
            <input type="password" class="form-control" id="id-password2" placeholder="" onkeyup="jelszo2Valtozik()">
        </div>

        <div class="container">
            <div class="row">
            <div class="col text-center">
                <button class="btn btn-secondary mt-5 px-5" id="id-submit" type="submit" value="submit" disabled>Regisztrálok</button>
            </div>
            </div>
        </div>

    </form>

<script>
    // Ha a jelszo2 mezőbe ír a felhasználó, megnézzük, hogy a jelszó1 és a jelszó2 egyeznek-e
    // Itt lehetne ellenőrizni a jelszó hosszát is
    // Ha minden ellenőrzés OK, csak akkor engedélyezzük a REGISZTRÁL gombot
    function jelszo2Valtozik() {
        let jelszo1 = document.getElementById('id-password1').value;
        let jelszo2 = document.getElementById('id-password2').value;
        
        if(jelszo1 != jelszo2) {
            document.getElementById('id-submit').disabled = true;
        }
        else {
            document.getElementById('id-submit').disabled = false;
        }
    }
</script>