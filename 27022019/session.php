<?php  
    session_start();
    $during = time() - $_SESSION['time1'];
    echo "Уважаемый, ".$_POST['yourname']." ".$_POST['patronymic']." ".$_POST['lastname'].", длительность Вашей сессии составляет: ".date("H:i:s", mktime(0, 0, $during))."(минут:секунд).";
?>