<?php


$pagination = "<ul class='nav'><li class='page-item".((($currentPage-1) < 0) ? ' disabled' : '')."'><a class='page-link' href='$currentURL&page=".((($currentPage-1) < 0) ? 0 : ($currentPage-1))."'>Previous</a></li>";
for ($i = 0; $i < $pageCount; $i++) {
    $pagination .= "<li class='page-item". (($currentPage == $i) ? ' active' : '') ."'><a class='page-link' href='$currentURL&page=$i'>".($i + 1)."</a></li>";
}
$pagination .= "<li class='page-item".((($currentPage+1) > $pageCount-1) ? ' disabled' : '')."'><a class='page-link' href='$currentURL&page=".((($currentPage+1) > $pageCount-1) ? $pageCount-1 : ($currentPage+1))."'>Next</a></li></ul>";

echo $pagination;

echo "<table class='table table-dark'>";

echo "<tr>";
foreach ($product_column_names as $value) {
    echo "<th>".$fields_comments_product[$value]."</th>";
}
echo "</tr>";
if (!empty($table)) {
    foreach ($table as $row) {
        echo "<tr>";
        foreach ($row as $k => $v) {
            if ($k == 'img') {
                echo "<td><img src='".Conf::img_path.((!empty($v)) ? $v : 'empty.jpg')."' height = '80'></td>";
            } else {
                echo "<td>$v</td>";
            }
        }
        echo "<td><a href='$targetDelURL&id=".$row['id']."'>Удалить</a></td>
        <td><a href='$targetEditURL&id=".$row['id']."'>Редактировать</a></td></tr>";
    }
}
    

echo '</table>';
echo $pagination;
echo "<br><a href='$targetAddURL' class='btn btn-primary'>Добавить</a>";

?>