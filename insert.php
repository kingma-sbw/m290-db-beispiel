<?php
$link_name = $_POST['linkname'];
$link_url = $_POST['linkurl'];
$sprache_id = $_POST['sprache_id'];
$kategorie_id = $_POST['kategorie_id'];

require_once 'connect.php';

$sql = "INSERT INTO link(link_name,link_url,kategorie_id,sprache_id) values('$link_name','$link_url','$kategorie_id', '$sprache_id')";

$db-> query($sql) or die($db->error);

echo "Neuer Datensatz: " . $db-> affected_rows;
?>
<p><a href="./">Zurück</a></p>
