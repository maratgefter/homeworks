<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
    $mysqli = new mysqli("localhost", "root", "", "mydb");

    if($mysqli->connect_errno){
        echo "Не удалось подключиться к MYSQL: (".$mysqli->connect_errno.")".$mysqli->connect_error;
    }

    $mysqli->query("INSERT INTO `table1` (`fio`, `age`, `mail`, `opinion`, `phone_number`, `mark`)
    VALUES ('".$_POST["name"]."', '".$_POST["age"]."', '".$_POST["post"]."','".$_POST["opinion"]."', '".$_POST["phone_number"]."', '".$_POST["mark"]."')");

    $mysqli->close();

    echo "<div class='thanks'>Спасибо за отзыв!!!</div>";
?>

</body>
</html>