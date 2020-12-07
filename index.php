<?php
require_once 'connect.php';

$sql = "SELECT
    `link`.`link_id`,
    `link`.`link_name`,
    `kategorie`.`kategorie_$lang`,
    `sprache`.`sprache_$lang`,
    `link`.`link_url`
FROM `link` 
	LEFT JOIN `kategorie` ON `link`.`kategorie_id` = `kategorie`.`kategorie_id` 
    LEFT JOIN `sprache` ON `link`.`sprache_id` = `sprache`.`sprache_id`

";
$result = $db-> query($sql) or die( 'Fehler:'.$db->error );

$sql = "SELECT `kategorie`.`kategorie_id`, `kategorie`.`kategorie_de`, `kategorie`.`kategorie_en`
FROM `kategorie`;";
$kategorien = $db-> query($sql);

$sql = "SELECT `sprache`.`sprache_id`, `sprache`.`sprache_de`, `sprache`.`sprache_en`
FROM `sprache`";
$sprachen = $db-> query($sql);

?>
<!DOCTYPE html>
<html lang="<?=$lang?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB App</title>
</head>

<body>
    <h1>Links-Datenbank</h1>

    <form method="post" action="insert.php" style="background-color:aliceblue">
        <label for="linkname">Link</label>
        <input type="text" name="linkname" id="linkname"><br>

        <label for="linkurl">URL</label>
        <input type="text" name="linkurl" id="linkurl"><br>

        <label for="kategorie">Kategorie</label>
        <select name="kategorie_id" id="kategorie">
            <?php  while($kat_row = $kategorien-> fetch_array()) : // Gib alle Kategorien (Deutsch) aus?>
                <option value="<?=$kat_row['kategorie_id']?>"><?=$kat_row['kategorie_'.$lang]?></option>
            <?php endwhile; ?>
        </select><br>

        <label for="sprache">Sprache</label>
        <select name="sprache_id" id="sprache">
            <?php while($spr_row = $sprachen-> fetch_array()) : // Gib all Sprache (Deutsch) aus?>
                <option value="<?=$spr_row['sprache_id']?>"><?=$spr_row['sprache_'.$lang]?></option>
            <?php endwhile; ?>
        </select><br>

        <input type="submit" value="OK">
    </form>

<?php if( $row = $result->fetch_array() ) : //Gibt es daten??>

    <!-- Überschrift -->
    <table style="background-color:bisque;width:100vw;">
    <tr>
        <th>Link</th>
        <th>Kategorie</th>
        <th>Sprache</th>
        <th colspan="2">Edit</th>
    </tr>
    
<?php do { // Wiederhole solange ?>

    <tr>
        <td><a href=" <?=$row[ 'link_url' ] ?> "><?=$row[ 'link_name' ] ?></a></td>
        <td><?=$row[ 'kategorie_'.$lang ] ?></td>
        <td><?=$row[ 'sprache_'.$lang ] ?></td>
        <td>
            <form method="post" action="delete.php">
                <input type="hidden" name="link_id" value="<?=$row['link_id']?>">
                <input type="submit" value="delete">
            </form>
        </td>
        <td>
            <form method="post" action="update.php">
                <input type="hidden" name="link_id" value="<?=$row['link_id']?>">
                <input type="submit" value="ändern">
            </form>
        </td>
    </tr>

<?php } while( $row = $result-> fetch_array() ); // .. bis keine Datensätze mehr da?>
    <!-- bis alle Datensätzen -->
    
    </table>
    
<?php else : // Is gibt keine Daten?>

    <p>keine daten gefunden.</p>

<?php endif; ?>
    
</body>
</html>