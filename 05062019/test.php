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

        td, th {
            border: 2px solid black;
        }

        a {
            text-decoration: none;
        }
    </style> 
</head>
<body>
    <?php
        function show($table, $field, $ordered_field = null) 
        {
            echo "\t\n<table>";
            echo "<tr>";
            foreach ($field as $v) {
                echo "\t<th><a href='?order=$v'>$v".($ordered_field == $v ? "🔼" : "")."</a></th>";
            }
            echo "<th></th></tr>";
            foreach ($table as $v) {
                echo "\t\n<tr>";
                foreach ($v as $val) {
                    echo "\t<td>$val</td>";    
                }
                echo "<td><a href='?delete=$v[id]'>✖️</a></td></tr>";
            }
            echo '</table>';
        }

        $obj->add_order_by_asc($_GET['order']);
        
        if (isset($_GET['delete'])) {
            echo $obj->delete_from($_GET['delete']);
        }
        
        show($obj->query(), $obj->get_fields(), $_GET['delete']);

        
       // echo $obj->add(['name' => "Vasya", 'age' => "22", 'city' => "smart"]);
    ?>
    
</body>
</html>