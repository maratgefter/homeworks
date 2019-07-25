<?php

class productController extends tableController {

    public $table_name = 'product';

    function __construct($view)
    {
        parent::__construct($view);
        $this->view->setLayoutsPath('views/layouts/mainLayout.php')->setViewPath('views/product/');
        global $conf;
        $this->table = new productModel(new mysqli(Conf::mysql_host, Conf::mysql_user, Conf::mysql_password, Conf::mysql_db), $this->table_name);
        $this->table->set_page_size(5);
        //Conf::mysql_host;
    }

    function actionShowTable() {
        $this->table->productQueryPrepare();
        parent::actionShowTable();
    }

    function actionShowAddForm() {
        $this->render("addForm", [
            'fields' => array_diff($this->table->get_fields(), ['id', 'time']),
            'targetURL' => '?t='.$this->classNameNP().'&a=addrow',
            'categories' =>$this->table->set_table_name('categories')->query()
        ]);
    }

    function actionShowEditForm() {
        $this->render("editForm", [
            'comments' => $this->table->get_field_comments(),
            'row' => $this->table->get_row_by_id($_GET['id']),
            'targetEditURL' => '?t='.$this->classNameNP().'&a=editrow&id='.$_GET['id'],
            'categories' =>$this->table->reset_where_condition()->set_table_name('categories')->query()
        ]);
    }
}

?>