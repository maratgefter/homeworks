<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <p><textarea name="text" cols="30" rows="10" placeholder="<?=(isset($_POST["text"])) ? $_POST["text"] : "Введите текст";?>"></textarea></p>
        <input type="submit" value="Ok!!!">
    </form>

    <?php
        include 'func.php';
        if (!empty($cens = swear_words($_POST['text']))) {
            echo "Вы ввели следующие нецензурные слова: ";
            echo "<ol>";
            foreach ($cens as $value) {
                echo '<li>'.$value.'</li>';
            }
            echo "</ol>";
        } else {
        echo smile(mark(bb_code(htmlspecialchars($_POST['text']))));
        }   
        //echo swear_words($_POST['text']);
    ?>
</body>
</html>