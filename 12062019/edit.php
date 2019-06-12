<?php

include 'config.php';
include 'DB_entity.php';

$link = new mysqli($conf['host'], $conf['user'], $conf['password'], $conf['db']);
$obj = new DB_entity($link, $conf['table']);

?>

<form action="edit2.php?id=<?=$_GET['id']?>" method="post">
<?php
    foreach ($obj->get_row_by_id($_GET['id']) as $key => $val) {
        echo $key;
        echo "<input type='text' name=$key value=$val>";
    }
    ?>
    <input type="submit"><br><br>
</form>
