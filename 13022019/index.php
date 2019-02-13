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
        <textarea name="feld" id="feld" cols="30" rows="10"></textarea>
        <input type="submit" value="Давай!">
    </form>
</body>
</html>

<pre>
<?php
//echo "Число символов в тексте: ".preg_match_all('/\w{1}/u', $_POST["feld"], $mathes)."!";
echo "Число символов в тексте: ".iconv_strlen($_POST["feld"])."!";
echo "<br><br>";
echo "Число слов в тексте: ".preg_match_all('/\b\w{1,15}\b/u', $_POST["feld"], $mathes)."!";
echo "<br><br>";
echo "Число слов с 10-ю символами: ".preg_match_all('/\b\w{10}\b/u', $_POST["feld"], $mathes)."!";
echo "<br><br>";
print_r ($mathes);
?>
</pre>