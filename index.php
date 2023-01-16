<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

// konfig betöltése
require_once('./includes/config.inc.php');

// session helper betöltése
require_once('./logicals/session_helper.php');

// oldal header részének betöltése
require_once('./templates/index.tpl.php');

require_once('./templates/menu.tpl.php');
?>

