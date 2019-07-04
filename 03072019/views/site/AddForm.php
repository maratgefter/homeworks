<?php

// print_r($fields);
// print_r($targetURL);
echo "<form method='post' action='index.php".$targetURL."'>";
foreach ($fields as $value) {
    echo "<label>$value<input type='text' placeholder='введите $value' name='$value'></value>";
}
echo "<input type='submit' value='Добавить запись'>";
echo "</form>";

// print_r($_POST);

?>