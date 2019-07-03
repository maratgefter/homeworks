<?php

class siteView
{
    public $viewName;
    public $viewData;

    function __construct()
    {  }

    function render($viewName, $viewData = [])
    {
        $this->viewName = $viewName;
        $this->viewData = $viewData;

        extract($this->viewData);
        include 'views/layouts/mainLayout.php';
    }

    function body()
    {
        extract($this->viewData);
        include 'views/site/' .$this->viewName . '.php';
    }

}
?>