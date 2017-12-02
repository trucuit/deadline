<?php

class IndexController extends Controller
{
    public function __construct($params)
    {
        parent::__construct($params);
        $this->_templateObj->setFolderTemplate('default/main');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
        $this->_view->arrCourseHeader = $this->_model->getItemHeader();
    }

    public function indexAction()
    {

        $this->_view->category = $this->_model->homeQuery();
        $this->_view->listFindCourse = $this->_model->getIDNameCategory();
        $this->_view->statistics = $this->_model->getStatistics();

        $this->_view->render('index/index');
    }

    public function findAction()
    {
        $this->_view->resultFind['list'] = $this->_model->getResultFind($this->_arrParam['form']);
        $this->_view->resultFind['search'] = $this->_arrParam['form']['search'];
        if ($this->_arrParam['form']['find'] == 0) {
            $this->_view->resultFind['category'] = "All Category";
        } else {
            $this->_view->resultFind['category'] = $this->_model->select(DB_TBCATEGORY, $this->_arrParam['form']['find'],1)['name'];
        }

        $this->_view->render('find/index');
    }


}