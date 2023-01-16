<?php

// A projekt könyvtára
define('APPROOT', 'http://localhost/feladat');
//define('APPROOT', 'https://g889ln.eu/feladat');

/*  1. feladatpont: 
    menüneveket és közös adatokat konfigurációs fájlból olvassa be egy TÖMB-ből (array)
*/

// az oldal felépítése
// külső array: a menüpontok URL-je,
// belső array: a menüpont neve (ez szerepel a menürendszerben), 
// illete a két szám, hogy mikor jelenjen meg a menüpont:
//  x, y:
//  ha x = 1, akkor a menüpont megjelenik, ha a felhasználó be van jelentkezve
//  ha x = 0, akkor a menüpont nem jelenik meg, ha a felhasználó be van jelentkezve
//  ha y = 1, akkor a menüpont megjelenik, ha a felhasználó nincs bejelentkezve
//  ha y = 0, akkor a menüpont nem jelenik meg, ha a felhasználó nincs bejelentkezve
$oldalak = array(
    'eredeti' => array(
        'fajl' => 'eredeti',
        'szoveg' => 'Főoldal',
        'menun' => array(1, 1)
    ),

    'videok' => array(
        'fajl' => 'videok',
        'szoveg' => 'Videók',
        'menun' => array(1, 1)
    ),

    'cikkek' => array(
        'fajl' => 'kepek',
        'szoveg' => 'Képek',
        'menun' => array(1, 1)
    ),

    'kapcsolat' => array(
        'fajl' => 'kapcsolat',
        'szoveg' => 'Kapcsolat',
        'menun' => array(1, 1)
    ),

    'uzenetek' => array(
        'fajl' => 'uzenetek',
        'szoveg' => 'Üzenetek',
        'menun' => array(1, 1)
    ),

    /*  6. feladatpont:
        Bővítsük a honlapot „Belépés” és „Kilépés” menüponttal a következők szerint:
        a) A „Belépés” menüpont akkor látható, ha nincs bejelentkezve a felhasználó.
        b) A „Kilépés” menüpont akkor látható, ha be van jelentkezve a felhasználó.
    */
    'kilepes' => array(
        'fajl' => 'kilepes',
        'szoveg' => 'Kilépés',
        'menun' => array(1, 0)
    ),

    'belepes' => array(
        'fajl' => 'belepes',
        'szoveg' => 'Belépés',
        'menun' => array(0, 1)
    )
);

// Adatbázis adatok
$db_user = "bence";
$db_pass = "monitorrongalo12";
$db_host = "localhost";
$db_name = "beadando";
