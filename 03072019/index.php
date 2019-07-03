<?php
session_start();

spl_autoload_register(function ($class){
    $sources = array("controllers/$class.php", "models/$class.php", "views/$class.php");
    foreach ($sources as $source) {
        if (file_exists($source)){
            require_once $source;
        }
    }
});

include_once "core/router.php";

// $obj = new newController();
// $obj -> test();
// echo $obj -> classNameNP();

// $obj1 = new newModel();
// $obj1 -> test();

// $obj2 = new newView();
// $obj2 -> test();