<?php
$id = $_POST['link_id'];

require_once 'connect.php';

$sql = "DELETE FROM `link` WHERE `link_id` = $id";
$db-> query($sql);
echo "Datensätz gelöscht: " . $db-> affected_rows;
?>
<p><a href="./">Zurück</a></p>
