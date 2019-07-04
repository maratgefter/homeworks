<?php

//print_r($table);
//function show($table) {
    echo "\t\n<table class='table'>";
    foreach ($table as $v) {
        echo "\t\n<tr>";
        foreach ($v as $val) {
            echo "\t<td>$val</td>";    
        }
        echo "<td><a href='$targetDelURL&id=".$v['id']."'>Удалить</a><td>";
        echo "<td><a href='$targetEditURL&id=".$v['id']."'>Редактировать</a><td>";
        echo '</tr>';
    }
    echo '</table><hr>';
//}
// print_r($this->viewData['targetDelURL']);

// show($table);

?>