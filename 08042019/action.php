<?php
    session_start();
    $_SESSION['bad_form'] = [];
    $_SESSION['post'] = $_POST;

    $mysqli = new mysqli("localhost", "root", "", "mydb");

    if($mysqli->connect_errno){
        echo "Не удалось подключиться к MYSQL: (".$mysqli->connect_errno.")".$mysqli->connect_error;
    }


    if (empty($_POST["name"])) {
        $_SESSION['bad_form']['bad_fio'] = "Введите ваше имя!";
    } else if (!preg_match("/^[А-ЯA-Z][а-яa-zА-ЯA-Z\-]{0,}\s[А-ЯA-Z][а-яa-zА-ЯA-Z\-]{1,}(\s[А-ЯA-Z][а-яa-zА-ЯA-Z\-]{1,})?$/u", $_POST['name'])) {
        $_SESSION['bad_form']['bad_fio'] = "Введите ваше имя верно!";
    }

    if (empty($_POST["age"])) {
        $_SESSION['bad_form']['bad_age'] =  "Введите ваш возраст!";
    }

    if (empty($_POST["opinion"])) {
        $_SESSION['bad_form']['bad_opinion'] =  "Введите ваш отзыв!";
    }

    if (empty($_POST["phone_number"])) {
        $_SESSION['bad_form']['bad_phone_number'] =  "Введите ваш номер телефона!";
    } else if (!preg_match("/\+\d/", $_POST['phone_number'])) {
        $_SESSION['bad_form']['bad_phone_number'] =  "Введите ваш номер телефона корректно!";
    }

    if (empty($_POST["mark"])) {
        $_SESSION['bad_form']['bad_mark'] =  "Вы не поставили оценку!";
    }

    if (!empty($_SESSION['bad_form'])){
        header("Location: login.php");
        exit();
    } 

    $mysqli->query("INSERT INTO `table1` (`fio`, `age`, `mail`, `opinion`, `phone_number`, `mark`)
    VALUES ('".$_POST["name"]."', '".$_POST["age"]."', '".$_POST["post"]."','".$_POST["opinion"]."', '".$_POST["phone_number"]."', '".$_POST["mark"]."')");

    $mysqli->close();

    header("Location: thanks.php");
?>