<?php
    if (empty($_GET['page'])) {
        $_GET['page'] = 1;
    }
    if (empty($_GET['select_order'])) {
        $_GET['select_order'] = 1;
    }
?>

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
    <form action="" method="get">
        <select name="select_order">
            <option value="1">fio</option>
            <option value="2">mark</option>
            <option value="3">email</option>
            <option value="4">tel</option>
            <option value="5">feedback</option>
            <option value="6">time</option>
        </select>
        <input type="submit">
    </form>

<?php
    include 'config.php';
    $mysqli = new mysqli($conf['host'], $conf['user'], $conf['password'], $conf['data_base']='mydb');

    if($mysqli->connect_errno){
        echo "Не удалось подключиться к MYSQL: (".$mysqli->connect_errno.")".$mysqli->connect_error;
    }

    switch ($_GET['select_order']) {
        case 1:
           $order = " ORDER BY `fio`";
            break;
        case 2:
           $order = " ORDER BY `mark`";
            break;
        case 3:
           $order = " ORDER BY `email`";
            break;
        case 4:
           $order = " ORDER BY `tel`";
            break;
        case 5:
           $order = " ORDER BY `feedback`";
            break;
        case 6:
           $order = " ORDER BY `time`";
            break;
        default:
            $order = "";
            break;
    }

    $count=$mysqli->query("SELECT COUNT(*) AS 'c' FROM `table1`")->fetch_assoc()['c'];
    $count_of_pages=ceil($count/$conf['page_size']);
    $pagination='';

    for ($i=1; $i <= $count_of_pages; $i++) { 
        $pagination.= "<a href='?page=$i&select_order=".$_GET['select_order']. "' ".($_GET['page']==$i?'class="selected"':'').">$i</a>";
    }
        $pagination = "<div class='pages'>".$pagination."</div>";

    $sql = "SELECT * FROM `table1` ".$order." LIMIT ".(($page_number-1)*$conf['page_size']).", ".$conf['page_size'];
    $res = $mysqli->query($sql);
    print_r ($res);

    echo $pagination;

    while ($row=$res->fetch_assoc()) {
        echo '<div id="opinion">';
        foreach($row as $v) {
            echo "<div>".$v."</div>";
        }
        echo '</div>';
    }
    echo $pagination;
?>

</body>
</html>