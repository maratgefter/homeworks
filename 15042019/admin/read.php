<?php
    include 'config.php';

    if (empty($_GET['page'])) {
        $_GET['page'] = 1;
    }

    if (empty($_GET['select_order'])) {
        $_GET['select_order'] = 0;
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
        <select name="select_order" id="select_order">
        <?php
            $fields_list = ['fio', 'mark', 'mail', 'phone_number', 'opinion', 'date'];
            $fields_list_discription = ['ФИО', 'Оценка', 'электронная почта', 'телефон', 'отзыв', 'дата отзыва'];
            foreach ($fields_list as $key => $value) {
                echo '<option value="' .$key. '" '.($_GET['select_order'] == $key ? 'selected="selected"': '') . '>' .$fields_list_discription[$key].'</option>';
            }
        ?>
        </select>
        <input type="submit">
        <a href="save_to_csv.php">Скачать базу отзывов</a>
    </form>

<?php
    $mysqli = new mysqli($conf['host'], $conf['user'], $conf['password'], $conf['data_base']='mydb');

    if($mysqli->connect_errno){
        echo "Не удалось подключиться к MYSQL: (".$mysqli->connect_errno.")".$mysqli->connect_error;
    }

    $count=$mysqli->query("SELECT COUNT(*) AS 'c' FROM `table1`")->fetch_assoc()['c'];
    $count_of_pages=ceil($count/$conf['page_size']);
    $pagination='';

    for ($i=1; $i <= $count_of_pages; $i++) { 
        $pagination.= "<a href='?page=$i&select_order=".$_GET['select_order']. "' ".($_GET['page']==$i?'class="selected"' : '').">$i</a>";
    }
        $pagination = "<div class='pages'>".$pagination."</div>";

    $sql = "SELECT * FROM table1 ORDER BY " .$fields_list[$_GET['select_order']]." LIMIT ".(($_GET['page']-1)*$conf['page_size']).", ".$conf['page_size'];
    $res = $mysqli->query($sql);
    //print_r ($res);

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