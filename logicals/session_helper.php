<?php
session_start();

// Itt állapítom meg, hogy a felhasználó be van-e jelentkezve.
// Ha igen, akkor TRUE-t, ellenkező esetben FALSE-t ad vissza
function bejelentkezve() {
    if (isset($_SESSION['csaladinev'])) {
        return true;
    } else {
        return false;
    }
}