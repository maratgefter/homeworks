<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>

<?php
    $mysqli = new mysqli("localhost", "root", "", "mydb");

    if($mysqli->connect_errno){
        echo "Не удалось подключиться к MYSQL: (".$mysqli->connect_errno.")".$mysqli->connect_error;
    }

    $res = $mysqli->query("SELECT * FROM `table1`");

    while ($row=$res->fetch_assoc()){
        echo '<div id="opinion">';
        foreach($row as $v) {
            echo "<div>".$v."</div>";
        }
        echo '</div>';
    }
?>

</body>
</html>