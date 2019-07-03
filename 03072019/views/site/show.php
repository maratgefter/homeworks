<?php

//print_r($table);
function show($table) {
    echo "\t\n<table>";
    foreach ($table as $v) {
        echo "\t\n<tr>";
        foreach ($v as $val) {
            echo "\t<td>$val</td>";    
        }
        echo '</tr>';
    }
    echo '</table><hr>';
}

show($table);

?>