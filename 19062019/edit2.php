<?php

include 'config.php';
include 'DB_entity.php';

$link = new mysqli($conf['host'], $conf['user'], $conf['password'], $conf['db']);
$obj = new DB_entity($link, $conf['table']);

if (!empty($_POST)) {
    $obj->edit($_GET['id'], $_POST);
}

header("Location: index1.php");

?>