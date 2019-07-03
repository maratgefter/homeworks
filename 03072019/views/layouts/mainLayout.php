<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
</head>
<body>
    <ul class="menu">
        <li>
            <a href="?t=site&a=showTable">Table</a>
        </li>
        <li>
            <a href="?t=site&a=showaddForm">addform</a>
        </li>
        <li>
            <a href="?t=site&a=about">22</a>
        </li>
        <li>
            <a href="">33</a>
        </li>
    </ul>
    <div id="maincontent">
        <?php $this->body(); ?>
    </div>
</body>
</html>