<?php

class CategoryController extends Controller
{
    private $table = DB_TBCATEGORY;

    public function __construct($params)
    {
        parent::__construct($params);
        $this->_templateObj->setFolderTemplate('default/main');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }

    public function showCourseAction()
    {
        $this->_view->listCourse = $this->_model->getCourse($this->_arrParam['id_category']);
        $this->_view->listCategory = $this->_model->showAll(DB_TBCATEGORY);
        $this->_view->render($this->table . '/index');
    }

}