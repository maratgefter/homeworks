<?php

class siteView
{
    public $viewName;
    public $viewData;
    public $viewPath = 'views/site/';
    public $layoutsPath = 'views/layouts/mainLayout.php';

    function setViewPath($viewPath)
    {
        $this->viewPath = $viewPath;
        return $this;
    }

    function setLayoutsPath($layoutsPath)
    {
        $this->layoutsPath = $layoutsPath;
        return $this;
    }

    function __construct()
    {  }

    function render($viewName, $viewData = [])
    {
        $this->viewName = $viewName;
        $this->viewData = $viewData;

        extract($this->viewData);
        include $this->layoutsPath;
    }

    function body()
    {
        extract($this->viewData);
        include $this->viewPath.$this->viewName.'.php';
    }

}
?>