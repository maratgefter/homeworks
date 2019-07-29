<?php

// function show_new($table)
// {
$pagination = "<ul class='nav'><li class='page-item".((($currentPage-1) < 0) ? ' disabled' : '')."'><a class='page-link' href='$currentURL&page=".((($currentPage-1) < 0) ? 0 : ($currentPage-1))."'>Previous</a></li>";
for ($i = 0; $i < $pageCount; $i++) {
    $pagination .= "<li class='page-item". (($currentPage == $i) ? ' active' : '') ."'><a class='page-link' href='$currentURL&page=$i'>".($i + 1)."</a></li>";
}
$pagination .= "<li class='page-item".((($currentPage+1) > $pageCount-1) ? ' disabled' : '')."'><a class='page-link' href='$currentURL&page=".((($currentPage+1) > $pageCount-1) ? $pageCount-1 : ($currentPage+1))."'>Next</a></li></ul>";

echo $pagination;

echo "<table class='table table-dark'>";

echo "<tr>";
foreach ($table[0] as $k=>$v) {
    echo "<td>$k</td>";
}
echo "</tr>";

foreach ($table as $v) {
    echo "<tr>";
    foreach ($v as $val) {
        echo "<td>$val</td>";
    }
    echo "<td><a href='$targetDelURL&id=".$v['id']."'>Удалить</a></td>
        <td><a href='$targetEditURL&id=".$v['id']."'>Редактировать</a></td></tr>";
}

echo '</table>';
echo $pagination;
echo "<br><a href='$targetAddURL' class='btn btn-primary'>Добавить</a>";

print_r($fields_comments_product);

// print_r($table);
// }
// print_r ($this->viewData['targetDelURL']);
// echo $targetDelURL;

// show_new($table);

?>