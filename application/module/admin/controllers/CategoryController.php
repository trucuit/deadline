<?php

class CategoryController extends Controller
{
    private $table = DB_TBCATEGORY;

    public function __construct($params)
    {
        parent::__construct($params);
        $this->_templateObj->setFolderTemplate('admin/main');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();

    }

    public function indexAction()
    {
        $this->_view->listItem = $this->_model->showAll($this->table);
        $this->_view->render($this->table . '/index');
    }
}