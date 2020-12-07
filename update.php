<?php
$id = $_POST['link_id'];

require_once 'connect.php';

$sql = "SELECT * FROM link WHERE link_id=$id";
$result = $db-> query($sql) or die($db-> error);
$row = $result-> fetch_array();
$link_name = $row['link_name'];
$link_url = $row['link_url'];
$sprache_id = $row['sprache_id'];
$kategorie_id =$row['kategorie_id'];


$sql = "SELECT
    `kategorie`.`kategorie_id`,
    `kategorie`.`kategorie_de`,
    `kategorie`.`kategorie_en`
FROM `kategorie`
ORDER BY kategorie_de
";
$kategorien = $db-> query($sql) or die( $db-> error );

$sql = "SELECT `sprache`.`sprache_id`, `sprache`.`sprache_de`, `sprache`.`sprache_en`
FROM `sprache` ORDER BY sprache_de";
$sprachen = $db-> query($sql) or die( $db-> error );
?>

<form method="post" action="update_save.php">
    <label for="linkname">Link</label>
    <input type="text" name="linkname" id="linkname" value="<?=$link_name?>"><br>

    <label for="linkurl">URL</label>
    <input type="text" name="linkurl" id="linkurl" value="<?=$link_url?>"><br>

    <label for="kategorie">Kategorie</label>
    <select name="kategorieid" id="kategorie">
        <?php  while($kat_row = $kategorien-> fetch_array()) : ?>
            <?php $selected=$kategorie_id===$kat_row['kategorie_id']? 'selected': '';?>
            <option value="<?=$kat_row['kategorie_id']?>" <?=$selected?>><?=$kat_row['kategorie_'.$lang]?></option>
        <?php endwhile; ?>
    </select><br>

    <label for="sprache">Sprache</label>
    <select name="spracheid" id="sprache">
        <?php while($spr_row = $sprachen-> fetch_array()) : ?>
            <?php $selected=$sprache_id===$spr_row['sprache_id']? 'selected': '';?>
            <option value="<?=$spr_row['sprache_id']?>" <?=$selected?>><?=$spr_row['sprache_'.$lang]?></option>
        <?php endwhile; ?>
    </select><br>

    <input type="hidden" name="linkid" value="<?=$id?>">
    <input type="submit" value="OK">
</form>


<p><a href="./">Zurück</a></p>
