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

        function show($table, $fields, $ordered_field=null) {
            if (is_array($table)) {
                echo "<table class='table table-striped table-inverse'>";
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
                    echo "<td><a href='?delete=$v[id]' class = 'delete'><img src='delete.svg'></a></td><td><a href='edit.php?id=$v[id]' class = 'edit'><img src='edit.svg'></a></td></tr>";
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

        if (isset($_GET['page']) && ($_GET['page'] >= 0 && $_GET['page']<= ($obj->page_count()-1))) {
            $obj->set_page($_GET['page']);
        } else {
            $obj->set_page(0);
            $_GET['page'] = 0;
        }
        $obj->add_order_by_asc($_GET['order']);

        $pages = "<li class='page-item".((($_GET['page']-1) < 0) ? ' disabled' : '')."'>\n<a class='page-link' href='?page=".((($_GET['page']-1) < 0) ? 0 : ($_GET['page']-1))."'>Previous</a>\n";
        for ($i = 0; $i < $obj->page_count (); $i++) {
            $pages .= "<li class='page-item".(($_GET['page'] == $i) ? ' active' : '')."'><a class='page-link' href='?page=$i".(isset($_GET['order']) ? "&order=$_GET[order]" : '').
            (isset($_GET['dir']) ? "&dir=$_GET[dir]" : '') . "'>" . ($i + 1) . "</a></li>";
        }
        $pages .= "<li class='page-item".((($_GET['page']+1) > ($obj->page_count()-1)) ? ' disabled' : '')."'><a class='page-link' href='?page=".((($_GET['page']+1) > $obj->page_count()-1) ? ($obj->page_count()-1) : ($_GET['page']+1))."'>Next</a></li>\n";

        isset($_GET['delete']) ? $obj->delete ($_GET['delete']) : "";

        $pages = "<nav aria-label='Page navigation'><ul class='pagination'>\n$pages</ul></nav>\n";
        echo $pages;
        show($obj->query(), $obj->get_fields(), $_GET['order']);
        echo $pages;

        ?>

        <form action="add.php" method="post">
        <div class = "form-group" id = "add">
        <?php
            foreach (array_diff($obj->get_fields(), ['id']) as $value) {
                echo "<label for='".$value."'>$value</label><input type='text' name='".$value."' id='".$value."'>";
            }
            ?>
            <input type="submit" class="btn btn-primary" id = "button-submit">
        </div>
        </form>

  </body>
</html>