<?php

$siteClass = (isset($_GET["t"]) ? $_GET["t"] : 'site') . 'Controller';

$method = 'action' . (isset($_GET["a"]) ? $_GET["a"] : 'About');

$view = 'siteView';

if(class_exists($siteClass)) {
    if(class_exists($view)) { 
        $MVC = new $siteClass(new $view);  
        if(method_exists($MVC, $method)) {
            $MVC -> {$method}();
        } else {
            echo "Нет такого метода: $method";
        }
    } else {
        echo "нет такого класса: $view";
    }
} else {
    echo "Нет такого класса: $siteClass";
}

?>