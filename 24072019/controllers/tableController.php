<?php

abstract class tableController extends Controller {

    public $table_name;

    function __construct($view) {
        parent::__construct($view);
        $this->table = new tableModel(new mysqli(Conf::mysql_host, Conf::mysql_user, Conf::mysql_password, Conf::mysql_db), $this->table_name);
        $this->table->set_page_size(5);
    }

    function actionShowTable() {
        $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $this->render("show", [
            'title' => "show",
            'table' => $this->table->set_page($page)->add_order_by_asc('id')->query(),
            'targetDelURL' => '?t='.$this->classNameNP().'&a=delrow',
            'targetEditURL' => '?t='.$this->classNameNP().'&a=showeditForm',
            'targetAddURL' => '?t='.$this->classNameNP().'&a=showAddForm',
            'currentURL' => '?t='.$this->classNameNP().'&a='.$this->currentActionNameNP(),
            'currentPage' => $page,
            'pageCount' => $this->table->page_count()
        ]);
    }
    
    function actionShowAddForm() {
        $this->render("addForm", [
            'fields' => array_diff($this->table->get_fields(), ['id', 'time']),
            'targetURL' => '?t='.$this->classNameNP().'&a=addrow'
        ]);
    }

    function actionAddRow() {
        $this->table->add($_POST);
        $this->redirect('?t='.$this->classNameNP().'&a=ShowTable');
    }

    function actionShowEditForm() {
        $this->render("editForm", [
            'comments' => $this->table->get_field_comments(),
            'row' => $this->table->get_row_by_id($_GET['id']),
            'targetEditURL' => '?t='.$this->classNameNP().'&a=editrow&id='.$_GET['id']
        ]);
    }

    function actionEditRow() {
        $this->table->edit($_GET['id'], $_POST);
        $this->redirect('?t='.$this->classNameNP().'&a=ShowTable');
    }

    function actionDelRow() {
        $this->table->delete($_GET['id']);
        $this->redirect('?t='.$this->classNameNP().'&a=ShowTable');
    }

}

?>