<?php

include 'config.php';
include 'DB_entity.php';

$link = new mysqli($conf['host'], $conf['user'], $conf['password'], $conf['db']);
$obj = new DB_entity($link, $conf['table']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        tr:first-child{
            font-weight: bold;
        }
        td, th {
            border:2px solid black;
        }
    </style>
</head>
<body>
<?php

function show($table, $fields, $ordered_field=null) {
    if (is_array($table)) {
        echo "<table style='border:2px solid black; border-collapse:collapse;'>";
        echo "<tr>";
        foreach ($fields as $value) {
            echo "<th style='border:2px solid black;'><a href='?order=$value'>$value".($ordered_field == $value ? (isset($_GET['dir']) ? "🔻" : "🔼") : "")."</a></th>";
        }
        echo "<th></th><th></th></tr>";
        foreach ($table as $v) {
            echo "<tr>";
            foreach ($v as $val) {
                echo "<td>$val</td>";
            }
        echo "<td><a href='?delete=$v[id]'>Удалить</a></td><td><a href='edit.php?id=$v[id]'>Редактировать</a></td></tr>";
        }
        echo '</table><hr>';
    }
}

if (isset($_GET['page'])) {
    $obj->set_page($_GET['page']);
} else {
    $obj->set_page(0);
}
$obj->add_order_by_asc($_GET['order']);
for ($i = 0; $i < $obj->page_count (); $i++) {
    echo "<a href='?page=$i".(isset($_GET['order']) ? "&order=$_GET[order]" : '')."'>".($i+1)." |</a>";
}
isset($_GET['delete']) ? $obj->delete ($_GET['delete']) : "";

show($obj->query(), $obj->get_fields(), $_GET['order']);

?>

<form action="add.php" method="post">
<?php
    foreach (array_diff($obj->get_fields(), ['id']) as $value) {
        echo "<label for='".$value."'>$value<label><br><input type='text' name='".$value."' id='".$value."'><br><br>\n";
    }
    ?>
    <input type="submit"><br><br>
</form>
</body>
</html>