<?php

class CategoryController extends Controller
{
    public function __construct($params)
    {
        parent::__construct($params);
        $this->_templateObj->setFolderTemplate('admin/main');
        $this->_templateObj->setFileTemplate('category.php');
        $this->_templateObj->setFileConfig('category.ini');
        $this->_templateObj->load();
    }

    public function indexAction()
    {
        $this->_view->listCategory = $this->_model->showAll('category');
        $this->_view->render('category/index');
    }

    public function addAction()
    {
        if (isset($this->_arrParam['form'])) {
            $this->_arrParam['form']['image'] = $_FILES['image'];
            $validate = new Validate( $this->_arrParam['form']);
            $validate->addRule('category', 'string', ['min' => 5, 'max' => 200])
            ->addRule('image','file',['min'=>6400 , 'max'=>2097152,'extension'=>['jpg','png','jpeg']], false);
            $validate->run();
            $this->_arrParam['form'] = $validate->getResult();
            if ($validate->isValid() == false) {
                $this->_view->errors = $validate->showErrors();
              
            } else {
                $this->_arrParam['form']['image'] = $_FILES['image'];
                $this->_model->insertCategory($this->_arrParam['form']);
            }
        }
        $this->_view->render('category/add');

    }

    public function ajaxStatusAction()
    {
        echo json_encode($this->_model->chageStatus($this->_arrParam));
    }

    public function ajaxEditCategoryAction(){
        $this->_view->infoCategory = $this->_model->show('category',$this->_arrParam['id']);
        $this->_view->render('category/edit',false);
    }
}