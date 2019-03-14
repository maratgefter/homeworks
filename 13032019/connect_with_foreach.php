<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        $link = mysqli_connect("localhost", "root", "", "guest_book");

        if (mysqli_connect_errno()) {
            echo "Не удалось подключиться к MySQL: (" . mysqli_connect_errno() . ") " . mysqli_connect_error();
        }

        $res = mysqli_query($link, "SELECT * FROM messages");

        echo "<table border='1'>";
        
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            echo '<tr>';
            foreach ($row as $v) {
                echo "<td>$v</td>";
            }
            echo '</tr>';
        }
        echo '</table>';

        mysqli_free_result($res);

        mysqli_close($link);
    ?>

    <form action="" method="post">
        <p><input type="text" name="name" placeholder="Input your name"></p>
        <p><input type="text" name="message" placeholder="Input your message"></p>
        <p><input type="submit" value="Send"></p>
    </form>
    <?php
        print_r ($_POST);
    ?>
</body>
</html>