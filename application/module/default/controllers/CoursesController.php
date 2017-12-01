<?php


class CoursesController extends Controller
{
    public function __construct($params)
    {
        parent::__construct($params);
        $this->_templateObj->setFolderTemplate('default/main');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }

    public function indexAction()
    {
     $this->_view->video=$this->_model->videoQuery($this->_arrParam['id']);

     $this->_view->category=$this->_model->videoRelativeQuery($this->_arrParam['id'],$this->_view->video[0]['name_category']);

        $this->_view->render('courses/index');
    }



}