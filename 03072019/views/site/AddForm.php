<?php

print_r($fields);
echo "<form method='post' action=''>";
foreach ($fields as $value) {
    echo "<input type='text' placeholder='введите $value'>";
}
echo "<input type='submit' value='Добавить запись'>";
echo "</form>";

?>