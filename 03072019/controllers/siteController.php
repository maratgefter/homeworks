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
            //'table'=>$this->table->set_page($page)->query()
            'table'=>$this->table->query(),
            'targetDelURL'=> '?t=' . $this->classNameNP() . '&a=delrow',
            'targetEditURL'=> '?t=' . $this->classNameNP() . '&a=ShowEditForm'
        ]);
    }

    function actionShowAddForm()
    {
        $this->render("addForm", [
            'fields'=>array_diff($this->table->get_fields(), ['id']),
            'targetURL'=> '?t=' . $this->classNameNP() . '&a=addrow'
        ]);
    }

    function actionAddRow()
    {
        $this->table->add($_POST);
        $this->redirect('?t=' . $this->classNameNP() . '&a=ShowTable');
    }

    function actionDelRow()
    {
        $this->table->delete($_GET['id']);
        $this->redirect('?t=' . $this->classNameNP() . '&a=ShowTable');
    }

    function actionShowEditForm()
    {
        $this->render("EditForm", [
            'comments' => $this->table->get_field_comments(),
            'fields'=>array_diff($this->table->get_row_by_id($_GET['id']), ['id']),
            'targetEditURL'=> '?t=' . $this->classNameNP() . '&a=EditForm&id='.$_GET['id']
        ]);
    }

    function actionEditForm()
    {
        // echo $_GET['id'];
        // print_r ($_POST);
        $this->table->edit($_GET['id'], $_POST);
        $this->redirect('?t=' . $this->classNameNP() . '&a=ShowTable');
    }
}
?>