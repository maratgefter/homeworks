<?php

class productController extends tableController {

    public $table_name = 'product';

    function __construct($view)
    {
        parent::__construct($view);
        $this->view->setLayoutsPath('views/layouts/mainLayout.php')->setViewPath('views/product/');
        $this->table = new productModel(new mysqli(Conf::mysql_host, Conf::mysql_user, Conf::mysql_password, Conf::mysql_db), $this->table_name);
        $this->table->set_page_size(5);
    }

    function actionShowTable() {
        $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $this->render("show", [
            'title' => "show",
            'table' => $this->table->set_table_name('product')->productQueryPrepare()->set_page($page)->query(),
            'targetDelURL' => '?t='.$this->classNameNP().'&a=delrow',
            'targetEditURL' => '?t='.$this->classNameNP().'&a=showeditForm',
            'targetAddURL' => '?t='.$this->classNameNP().'&a=showAddForm',
            'currentURL' => '?t='.$this->classNameNP().'&a='.$this->currentActionNameNP(),
            'currentPage' => $page,
            'pageCount' => $this->table->set_table_name('product')->page_count(),
            'product_column_names' => $this->table->set_table_name('product')->get_fields(),
            'fields_comments_product' => $this->table->get_field_comments()
        ]);
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

    function actionAddRow()
    {
        $id = $this->table->add($_POST);
        if (!empty($_FILES['img']['name'])) {
        $file_name = "$id-".$FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], Conf::img_path.$file_name);
        $this->table->edit($id, ['img'=>$file_name]);
        }
        $this->redirect('?t='.$this->classNameNP().'&a=ShowTable');
    }
}

?>