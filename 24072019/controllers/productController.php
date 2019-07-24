<?php

class productController extends tableController {

    public $table_name = 'product';

    function __construct($view)
    {
        parent::__construct($view);
        $this->view->setLayoutsPath('views/layouts/mainLayout.php')->setViewPath('views/product/');
    }

}

?>