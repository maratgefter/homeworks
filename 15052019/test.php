<?

include "Tic_Tac_Toe_Para.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>

<?
$obj = new Tic_Tac_Toe (3);
$obj->show();
$obj->put_circle(2,0);
$obj->show();
$obj->put_cross(0,0);
$obj->show();
$obj->put_circle(1,1);
$obj->show();
$obj->put_cross(0,1);
$obj->show();
$obj->put_circle(0,2);
$obj->show();
echo $obj->check_winner();
echo $obj->interpolation();
echo $obj->horizontally();
echo $obj->horizontally_second();