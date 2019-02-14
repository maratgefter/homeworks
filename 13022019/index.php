<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Проверка электронной почты</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <form action="" method="post">
        <textarea name="feld" id="feld" cols="30" rows="10" placeholder="<?=(isset($_POST["feld"])) ? $_POST["feld"] : "Введите число";?>"></textarea><br><br>
        <input type="number" name="num" placeholder="<?=(isset($_POST["num"])) ? $_POST["num"] : "Введите число";?>"><br><br>
        <input type="submit" value="Давай!"><br><br>
        </form>
</body>
</html>

<pre>
<?php
//echo "Число символов в тексте: ".preg_match_all('/\w{1}/u', $_POST["feld"], $mathes)."!";
echo "Число символов в тексте: ".iconv_strlen($_POST["feld"])."!";
echo "<br><br>";
echo "Число слов в тексте: ".preg_match_all('/\b\w{1,15}\b/u', $_POST["feld"], $matches)."!";
echo "<br><br>";
echo "Число слов с ".$_POST["num"]." символами: ".preg_match_all('/\b\w{'.$_POST["num"].'}\b/u', $_POST["feld"], $mathes)."!";
echo "<br><br>";
//print_r ($mathes);
echo "<ol>";
foreach ($matches[0] as $value) {
    echo '<li>'.$value.'</li>';
}
echo "</ol>";
?>
</pre>