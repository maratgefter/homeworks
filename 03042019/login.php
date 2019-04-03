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
    <form action="action.php" method="post">
        <input type="text" name="name" placeholder="Введите Ваше имя"> 
        <input type="number" name="age" placeholder="Введите Ваш возраст">
        <input type="email" name="post" placeholder="Введите Ваш электронный адрес">
        <input type="tel" name="phone_number" placeholder="Введите Ваш номер телефона">
        <select name="mark">
            <option checked value="0">Пожалуйста, оцените наше мероприятие!</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <textarea name="opinion" cols="30" rows="10" placeholder="Напишите Ваш отзыв"></textarea>
        <input type="submit" value="Отправить">
    </form>
</body>
</html>