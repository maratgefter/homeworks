<?php

include 'config.php';
include 'DB_entity.php';

$link = new mysqli($conf['host'], $conf['user'], $conf['password'], $conf['db']);
$obj = new DB_entity($link, $conf['table']);

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

        tr:first-child{
            font-weight: bold;
        }
        td, th {
            border:2px solid black;
        }

        .active {
            color: red;
        }

        .delete {
            display: inline-block;
            background-size: cover;
            width: 20px;
            height: 20px; 
            background-image: url('data:image/svg+xml;utf8,<svg width="40" height="40" xmlns="http://www.w3.org/2000/svg"><path id="svg_1" d="m1.00089,10.2078l9.20691,-9.20691l9.78036,9.78028l9.78035,-9.78028l9.207,9.20691l-9.78036,9.78036l9.78036,9.78036l-9.207,9.20699l-9.78035,-9.78036l-9.78036,9.78036l-9.20691,-9.20699l9.78028,-9.78036l-9.78028,-9.78036z" stroke-width="1.5" stroke="#000" fill="#BF7E96"/></svg>');
        }

        .edit {
            display: inline-block;
            background-size: cover;
            width: 20px;
            height: 20px; 
            background-image: url('data:image/svg+xml;utf8, <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg"><path stroke="#000" id="svg_1" d="m16.682837,15.319759c-0.082763,-0.094712 -0.185447,-0.187542 -0.31637,-0.258758c-0.560192,-0.310536 -1.350725,-0.215818 -1.76142,0.212778c-0.409997,0.429614 -0.280404,1.03009 0.281076,1.3415c0.510168,0.281231 1.190966,0.213801 1.625372,-0.117056l-11.919848,12.500759l-3.705711,10.232867l11.634967,-5.856954l26.496877,-27.7882l-7.932454,-4.376793l-2.557079,2.681976c-0.146283,-0.44615 -0.472914,-0.865031 -1.002287,-1.159903c-1.228216,-0.677492 -2.945314,-0.472547 -3.835321,0.4637c-5.10008,5.352347 -2.272816,6.777679 -7.007802,12.124083l0.000002,0zm-5.835451,16.731204l-5.984944,3.012958l1.905794,-5.268217l4.079152,2.255259l-0.000002,0zm7.05017,-17.003586c3.67167,-4.126895 3.321939,-5.245898 6.464252,-8.908939c0.5198,0.271375 1.116549,0.367103 1.702381,0.343607l-8.166633,8.565334l0,-0.000001z" stroke-width="1.5" fill="#5B9BA2"/></svg>');
        }
    </style>
</head>
<body>
<?php

function show($table, $fields, $ordered_field=null) {
    if (is_array($table)) {
        echo "<table>";
        echo "<tr>";
        foreach ($fields as $value) {
            echo "<th><a href='?order=$value" . 
            ($ordered_field == $value ? (isset($_GET['dir']) ? "" : "&dir=desc") : "") . "'>$value" . 
            ($ordered_field == $value ? (isset($_GET['dir']) ? "🔽" : "🔼") : "") . "</a></th>";
        }
        echo "<td></td><td></td></tr>";
        foreach ($table as $v) {
            echo "<tr>";
            foreach ($v as $val) {
                echo "<td>$val</td>";
            }
            echo "<td><a href='?delete=$v[id]' class = 'delete'></a></td><td><a href='edit.php?id=$v[id]' class = 'edit'></a></td></tr>";
        }
        echo '</table>';
    }
}

if (isset($_GET['order'])) {
    if (isset($_GET['dir'])) {
        $obj->add_order_by_desc($_GET['order']);
    } else {
        $obj->add_order_by_asc($_GET['order']);
    }
}

if (isset($_GET['page'])) {
    $obj->set_page($_GET['page']);
} else {
    $obj->set_page(0);
}
$obj->add_order_by_asc($_GET['order']);

for ($i = 0; $i < $obj->page_count (); $i++) {
    $pages .= "<a href='?page=$i".(isset($_GET['order']) ? "&order=$_GET[order]" : '').
    (isset($_GET['dir']) ? "&dir=$_GET[dir]" : '') . "'" . (($_GET['page'] == $i) ? "class='active'" : '').">|" . ($i + 1) . "|</a>";
}

isset($_GET['delete']) ? $obj->delete ($_GET['delete']) : "";

echo "<div class = 'pages'>$pages</div>";
show($obj->query(), $obj->get_fields(), $_GET['order']);
echo $pages;

?>

<form action="add.php" method="post">
<?php
    foreach (array_diff($obj->get_fields(), ['id']) as $value) {
        echo "<label for='".$value."'>$value<label><br><input type='text' name='".$value."' id='".$value."'><br><br>\n";
    }
    ?>
    <input type="submit"><br><br>
</form>

<div class = "delete"></div>
</body>
</html>