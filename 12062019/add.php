<?php
include 'config.php';
include 'DB_entity.php';
$link = new mysqli($conf['host'], $conf['user'], $conf['password'], $conf['db']);
$obj = new DB_entity($link, $conf['table']);
if (!empty($_POST)) {
    $obj->add(array_intersect_key($_POST, array_flip($obj->get_fields())));
}
header("Location: project.php?page=".($obj->page_count()-1));
?>