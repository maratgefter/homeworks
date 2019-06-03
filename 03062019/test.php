<?php
        include "entity.php";

        $link = mysqli_connect("127.0.0.1", "root", "", "gefter2805");

        $obj = new DB_entity($link, 'object');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            border: 2px solid black;
        }
    </style> 
</head>
<body>
    <form action="" method="post">
            <p><select name="order">
                <?php
                    foreach ($obj->get_fields() as $value) {
                        echo "<option value=".$value.">".$value."</option>";
                    }
                ?>
            </select></p>
            <input type="submit" value="Сортировать!">
    </form>

    <?php
        function show($array) 
            {
                echo "\t\n<table>";
                foreach ($array as $v) {
                    echo "\t\n<tr>";
                    foreach ($v as $val) {
                        echo "\t<td>$val</td>";    
                    }
                    echo '</tr>';
                }
                echo '</table>';
            }

        $obj->add_order_by_asc($_POST['order']);
        echo "<br>".$obj->get_sql()."<br><br>";
        $fields[0] = $obj->get_fields();
        $result_table = array_merge($fields, $obj->query());
        show($result_table);
    ?>
    
</body>
</html>