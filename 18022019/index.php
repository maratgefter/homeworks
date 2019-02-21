<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <form action="" method="post">
        <p>Введите URL:</p>
        <input type="feld" name="feld" value="<?=(isset($_POST["feld"])) ? $_POST["feld"] : "Введите адрес сайта";?>"><br><br>
        <p>Введите количество символов:</p>
        <input type="number" name="num" value="<?=(isset($_POST["num"])) ? $_POST["num"] : "1";?>"><br><br>
        <input type="submit" value="Давай!"><br><br>
        </form>
</body>
</html>

<?php
    /*function take_body($str){
            $pat = '/<body>(.*)<\/body>/is';
            preg_match($pat, $str, $arr);
            $pat2 = '/<.*?>/is';
            $rep = "$1";
            $str2 = preg_replace($pat2, $rep, $arr[0]);
            //echo htmlentities($str2);
            return $str2;
    }*/

    function del_js($arr){
        $str2 = preg_replace('/<head>(.*)<\/head>/is', "", $arr);  //удалить HEAD
        return $str2;
    }

$str2 = del_js(file_get_contents($_POST['feld']));
echo htmlentities($str2);
//$str2 = take_body($str2);

// echo "Число символов в тексте: ".iconv_strlen($str2)."<br>";
// echo "Число слов в тексте: ".preg_match_all('/\w{1,}\b/u', $str2, $matches)."<br>";
// echo "Число слов с ".$_POST['num']." символами: " .preg_match_all('/\b\w{'.$_POST["num"].'}\b/u', $str2, $matches)."<br>";
// echo "Перечень слов: <ol>";
// for ($i = 0; $i < count($matches[0]); $i++) {
//     echo '<li>'.$matches[0][$i].'</li>';
// }
// echo "</ol>";
// $arr2 = array_count_values($matches[0]);
// arsort($arr2);
// echo "Слова, которые встречаются более одного раза:<ol>";
// foreach ($arr2 as $k => $v) {
//     if ($v >= 2) {
//         echo '<li>'.$k.' - '.$v.' раза;</li>';
//     }
// }
// echo "</ol>";
?>