<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <pre>

        <?php
        include "entity.php";

        $link = mysqli_connect("127.0.0.1", "root", "", "gefter2805");

        $obj = new DB_entity($link, 'object');

    //     echo $obj->get_sql();
    //     print_r($obj->query());
    //     $obj->add_where_condition('id = 1');
    //     echo $obj->get_sql();
    //     $obj->reset_where_condition();
    //     echo $obj->get_sql();
    //     $obj->add_where_condition("id = 1");
    //     echo $obj->get_sql();
    //     $obj->add_where_condition("city = 'Полоцк'");
    //     echo $obj->get_sql();
    //     $obj->reset_where_condition();
    //     echo $obj->get_sql();
    //     $obj->add_order_by_asc('name');
    //     $obj->add_order_by_asc('age');
    //     echo $obj->get_sql();
    //     $obj->reset_order_by();
    //     $obj->add_order_by_desc('name');
    //     $obj->add_order_by_desc('age');
    //     echo $obj->get_sql();
    //    // $obj->reset_order_by();
    //     echo $obj->get_sql();
    //     print_r($obj->query());
    //     $obj->reset_select();
    //     echo $obj->get_sql();
    //     $obj->add_select('city');
    //     echo $obj->get_sql();
    //     $obj->set_page(0);
            // $obj->set_group_by('id');
            $obj->add_having("'age'>30");
            echo $obj->get_sql();
            print_r($obj->query());
        ?>
    </pre>
</body>
</html>