<?php

include 'config.php';
include 'DB_entity.php';

$link = new mysqli($conf['host'], $conf['user'], $conf['password'], $conf['db']);
$obj = new DB_entity($link, $conf['table']);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php

        function show($table, $fields, $ordered_field=null, $fild_comments = null) {
            if (is_array($table)) {
                echo "<table class='table-dark table-inverse' style='width:100%'>";
                echo "<tr>";
                foreach ($fields as $value) {
                    echo "<th><a href='?order=$value" . 
                    ($ordered_field == $value ? (isset($_GET['dir']) ? "" : "&dir=desc") : "") . "'>".(empty($fild_comments[$value]) ? $value : $fild_comments[$value]) . 
                    ($ordered_field == $value ? (isset($_GET['dir']) ? "🔽" : "🔼") : "") . "</a></th>";
                }
                foreach ($table as $v) {
                    echo "<tr>";
                    foreach ($v as $val) {
                        echo "<td>$val</td>";
                    }
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

        ?>

        <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-0">111
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12">
            <?php

        show($obj->query(), $obj->get_fields(), $_GET['order'], $obj->get_field_comments());

        ?>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-0">111
            </div>
        </div>
        </div>
  </body>
</html>