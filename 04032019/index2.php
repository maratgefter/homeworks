<?php
        session_start();
        include 'func.php';
?>

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
        <p><input type="text" placeholder="Input your name" name="name"></p>
        <p><textarea name="message" cols="30" rows="10" placeholder="<?=(isset($_POST["message"])) ? $_POST["message"] : "Input your message";?>"></textarea></p>
        <p><input type="submit" value="Send"></p>
    </form>
    <style>
        table {
            border-collapse: collapse;
        }
        td  { 
            border: 2px solid black;
        }
    </style>
    
    <?php
        if (!empty(swear_words($_POST['message'])) || !empty(swear_words($_POST['name']))) {
            $_SESSION['time'] = time ();
            $ban_time = time() - $_SESSION['time'];
            echo "Вы заблокированы на 2 минуты за использование нецензурных слов! Прошло времени с момента блокировки: ".date("H:i:s", mktime(0, 0, $ban_time));
        } else if (time () < $_SESSION['time'] + 120) {
            $ban_time = time() - $_SESSION['time'];
            echo "Вы заблокированы на 2 минуты за использование нецензурных слов! Прошло времени с момента блокировки: ".date("H:i:s", mktime(0, 0, $ban_time));
        } else {
            $st = "<post>\n\t<nik>\n\t\t".$_POST['name']."\n\t</nik>\n\t<msg>\n\t\t".$_POST['message']."\n\t</msg>\n</post>"."\n\n";
           
            file_put_contents("x.xml", $st, FILE_APPEND);
            $str = file_get_contents('x.xml');
            
            $message = all_post($str);
             
             echo "<table>";
                 foreach ($message[0] as $k => $v) {
                     echo "<tr>"."<td>".$message[0][$k]."</td>"."<td>".smile(mark(bb_code($message[1][$k])))."</tr>"."</td>";
                 }
             echo "</table>";
        }   

    ?>
</body>
</html>