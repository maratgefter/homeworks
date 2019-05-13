<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title>Крестики нолики</title>
</head>
<body>
    <div id="control">
        <form id="start_game" action="start_game.php" method="post">
            <input type="submit" value="Начать новую игру!">
        </form>

        <form id="move" action="#" method="post">
            <p>Выберите сектор в который вы хотите походить:</p>
            <select size="1" name="zone">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </select><br><br>
            <p>За кого будет ход:</p>
            <p><input type="radio" name="player" value="X">Крестик</p>
            <p><input type="radio" name="player" value="O">Нолик</p>
            <br>
            <input type="submit" value="Сделать ход!">
        </form>
    </div>
    <?php
        require_once('Game.php');
        $new_game = new Game();

        if (empty($_POST['player'])) {
            $_SESSION['erro']='Выберите крестик или нолик!';
            $new_game->start_game($_SESSION['game']);
        } elseif ($new_game->check_player($_SESSION['player'], $_POST['player'])) {
            $_SESSION['player']=$_POST['player'];
            $_SESSION['erro']='Выберите другого игрока!';
            $new_game->start_game($_SESSION['game']);
        } elseif ($new_game->check_zone($_SESSION['game'], $_POST['zone'])) {
            $_SESSION['erro']='Выбранная вами зона зянята!';
            $new_game->start_game($_SESSION['game']);
        }else {
            $_SESSION['erro']='';
            $_SESSION['player']=$_POST['player'];
            $new_game->move($_SESSION['game'], $_POST['zone'], $_POST['player']);
            $new_game->start_game($_SESSION['game']);
            if ($new_game->end_game($_SESSION['game'])) {
                $_SESSION['erro']="Игра окончена! Победа за - ".$_POST['player'];
                $_SESSION['game']=[[1, 2, 3],[4, 5, 6],[7, 8, 9]];
            }
        }
       


    ?>
    <div id="erro">
       <h2><?=$_SESSION['erro']?></h2>
    </div>

</body>
</html>


