<?php
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="downloaded.csv"');

    include 'config.php';

    $mysqli = new mysqli($conf['host'], $conf['user'], $conf['password'], $conf['data_base']='mydb');

    if($mysqli->connect_errno){
        echo "Не удалось подключиться к MYSQL: (".$mysqli->connect_errno.")".$mysqli->connect_error;
    }

    $table = $mysqli->query("SELECT * FROM `table1`");

    while ($row = $table->fetch_assoc()) {
        //echo implode("mb_convert_encoding", $row)."\n";
        foreach ($row as $k => $v){
            echo mb_convert_encoding($v, "windows-1251", "utf-8").";";
        }
        echo "\n"; 
    }
?>