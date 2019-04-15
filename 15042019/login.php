<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="action.php" method="post" id="user">
        <?="<div class='fail'>".$_SESSION['bad_form']['bad_fio']."</div>"?>
        <input <?=!empty($_SESSION['bad_form']['bad_fio'])?'class="bad"':'';?> type="text" name="name" placeholder="Введите Ваше имя" value="<?=$_SESSION['post']['name']?>"> 
        <?="<div class='fail'>".$_SESSION['bad_form']['bad_age']."</div>"?>
        <input <?=!empty($_SESSION['bad_form']['bad_age'])?'class="bad"':'';?> type="number" name="age" placeholder="Введите Ваш возраст" value="<?=$_SESSION['post']['age']?>">
        <input type="email" name="post" placeholder="Введите Ваш электронный адрес" value="<?=$_SESSION['post']['post']?>">
        <?="<div class='fail'>".$_SESSION['bad_form']['bad_phone_number']."</div>"?>
        <input <?=!empty($_SESSION['bad_form']['bad_phone_number'])?'class="bad"':'';?> type="tel" name="phone_number" placeholder="Введите Ваш номер телефона" value="<?=$_SESSION['post']['phone_number']?>">
        <?="<div class='fail'>".$_SESSION['bad_form']['bad_mark']."</div>"?>
        <select name="mark">
            <option selected value="0">Пожалуйста, оцените наше мероприятие!</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <?="<div class='fail'>".$_SESSION['bad_form']['bad_opinion']."</div>"?>
        <textarea name="opinion" cols="30" rows="10" placeholder="Напишите Ваш отзыв" <?=!empty($_SESSION['bad_form']['bad_fio'])?'class="bad"':'';?>><?=$_SESSION['post']['opinion']?></textarea>
        <input type="submit" value="Отправить">
    </form>
</body>
</html>

<?php
    unset($_SESSION['bad_form']);
?>