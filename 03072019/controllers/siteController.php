<?php

class siteController extends Controller
{

    function __construct($view)
    {
        parent::__construct($view);

        $this->table = new tableModel(new mysqli('localhost', 'root', '', 'gefter2805'), 'object');
        $this->table->set_page_size(5);
    }

    function actionShowTable()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        //print_r($this->table->set_page($page)->query());

        $this->render("show", [
            'title'=>"show",
            'table'=>$this->table->set_page($page)->query()
        ]);
    }

    function actionShowAddForm()
    {
        $this->render("addForm", [
            'fields'=>array_diff($this->table->get_fields(), ['id']),
            'targetURL'=> '?t=' . $this->classNameNP() . '&a=addrow'
        ]);
    }
}
?>