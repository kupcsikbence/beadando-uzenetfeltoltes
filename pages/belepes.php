<?php
require_once('./kozos.php');

/*
 * 6.c) A „Belépés” menüpontra kattintva feljön egy oldal, ahol lehet bejelentkezni vagy regisztrálni.
*/

?>

<div class="wrapper-login mt-5">
    <h2 class="text-center mb-5">Jelentkezz be!</h5>

    <form action="./belep.php" method ="POST">

        <div class="mb-3 col-8 rounded mx-auto">
            <label for="id-user">Felhasználónév</label>
            <input type="text" class="form-control" id="id-user" placeholder="" name="username" autocomplete="off">
        </div>

        <div class="mb-3 col-8 rounded mx-auto">
            <label for="id-password">Jelszó</label>
            <input type="password" class="form-control" id="id-password" placeholder="" name="password">
        </div>

        <div class="container">
            <div class="row">
            <div class="col text-center">
                <button class="btn btn-secondary mt-5 px-5" id="submit" type="submit" value="submit">Belépés</button>
            </div>
            </div>
        </div>

    </form>

    <div>
        <div class="text-center mt-5">
            Nincs még felhasználóneved? <a href="./regisztracio.php" rel="noopener noreferrer">Regisztrálj egyet!</a>
        </div>
    </div>
</div>
