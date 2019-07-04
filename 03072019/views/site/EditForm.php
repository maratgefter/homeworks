<?php

echo "<form method='post' action='$targetEditURL'>";
foreach ($fields as $key=>$value) {
    echo "<label for=".$comments[$key].">$comments[$key]<input type='text' placeholder='введите $value' name='$key' value='$value'></label>";
}
echo "<input type='submit' value='Добавить запись'>";
echo "</form>";
//echo $targetEditURL;

?>