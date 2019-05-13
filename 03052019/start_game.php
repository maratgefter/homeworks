<?php
session_start();
$_SESSION['game']=[
                [1, 2, 3],
                [4, 5, 6],
                [7, 8, 9]
            ];
$_SESSION['zone']=NULL;
$_SESSION['player']=1;
$_SESSION['erro'] =NULL;
header('Location: index.php');
?>