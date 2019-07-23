<?php

class categoryController extends tableController {

    public $table_name = 'categories';

    function __construct($view)
    {
        parent::__construct($view);
        //$this->view->setLayoutsPath('views/layouts/simpleLayout.php');
    }

}

?>