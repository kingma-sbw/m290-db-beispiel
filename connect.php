<?php
/** @var string $lang Sprache der Applikation */
$lang = "de";

/** @var mysqli $db */
if( strstr($_SERVER['SERVER_NAME'], 'local') ) {
    $db = mysqli_connect('localhost','m290','m290','m290_links') or die('datenbank verbindung nicht möglich');
} else {
    $db = mysqli_connect('localhost','m290','m290-db','jkingma_m290') or die('datenbank verbindung nicht möglich');
}