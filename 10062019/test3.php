<?php
    include 'entity.php';

    $link = mysqli_connect("127.0.0.1", "root", "", "gefter2805");

    $obj = new DB_entity($link, 'object');
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

        //show($obj->query(), $obj->get_fields(), $_GET['delete']);
        // if (!empty($obj->error_list)) {
        //     foreach ($obj->error_list as $value) {
        //         echo $value."<br>";
        //     }
        // }

        // $obj->set_page_size(3);    
        // $obj->set_page(0);
        // show($obj->query(), $obj->get_fields());
        
        // $obj->set_page_size(3);    
        // $obj->set_page(1);
        // show($obj->query(), $obj->get_fields());

        // $obj->set_page_size(3);    
        // $obj->set_page(2);
        // show($obj->query(), $obj->get_fields());

        // $obj->set_page_size(3);    
        // $obj->set_page(3);
        // show($obj->query(), $obj->get_fields());

        // echo $obj->page_count();

        // echo "<hr>";
        // $obj->set_page_size(3);
        // if (isset($_GET['page'])) {
        //     $obj->set_page($_GET['page']);
        // }

        //echo $obj->clear_table();

        //show($obj->query(), $obj->get_fields());
        //show($obj->query(), $obj->get_fields());

        // for ($i = 0; $i < $obj->page_count(); $i++) {
        //     echo "<a href='?page=$i'>".($i + 1)." |</a>";
        // }
        show($obj->query(), $obj->get_fields());
        echo "<hr>";
        print_r($obj->edit(90, ["name"=>"Gay Lussak", "age" => 25, "city"=>"Vit"]));
        show($obj->query(), $obj->get_fields());

        
    ?>

</body>
</html>