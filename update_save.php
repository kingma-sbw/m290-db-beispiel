<?php

$link_id = $_POST['linkid'];
$link_name = $_POST['linkname'];
$link_url = $_POST['linkurl'];
$sprache_id = $_POST['spracheid'];
$kategorie_id = $_POST['kategorieid'];

require_once 'connect.php';

$sql = "UPDATE link
SET link_name='$link_name',
    link_url='$link_url',
    sprache_id='$sprache_id',
    kategorie_id='$kategorie_id'
WHERE link_id=$link_id";

$db-> query($sql) or die($db-> error);

echo "Datensätze geändert: " . $db-> affected_rows;
?>
<p><a href="./">Zurück</a></p>

