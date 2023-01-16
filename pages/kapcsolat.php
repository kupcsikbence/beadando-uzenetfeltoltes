<?php
require_once('./kozos.php');
?>

<div class="my-5">
    <h1 class="text-center mb-5">Kapcsolat</h1>
    <h5 class="mb-3">Az alábbi űrlap segítségével küldhet nekünk üzenetet:</h5>
</div>

<div>
    <form action="uzenetfeltolt.php" method="post">
        <div class="mb-3">
            <label for="id-email" class="form-label">Add meg az email címed:</label>
            <input type="email" class="form-control" name="emailcim" id="id-email" placeholder="nev@cim.hu" onkeyup="ellenorzes()">
        </div>
        
        <div class="mb-3">
            <label for="id-uzenet" class="form-label">Írd le az üzeneted:</label>
            <textarea class="form-control" id="id-uzenet" name="uzenet" rows="3" placeholder="Az üzenet..." onkeyup="ellenorzes()"></textarea>
        </div>

        <div class="mb-3 col-4">
            <button type="submit" id="id-submit" class="btn btn-primary" disabled>Elküldöm az üzenetet</button>
        </div>

    </form>
</div>

<script>
    // 4. feladatpont: Az ellenőrzést végezze el kliensoldalon is (JavaScript).
    function ellenorzes() {
        // az emailcím validálása
        const validateEmail = (email) => {
            return email.match(
                /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
        };

        // az email mező tartalma
        let email = document.getElementById('id-email').value;

        // az üzenet mező tartalma
        let uzenet = document.getElementById('id-uzenet').value;

        // ha mindkét mezőbe van írva, akkor aktív a küldés gomb
        if (email && uzenet && validateEmail(email)) {
            document.getElementById('id-submit').disabled = false;
        }
        else {
            document.getElementById('id-submit').disabled = true;
        }
    }
</script>