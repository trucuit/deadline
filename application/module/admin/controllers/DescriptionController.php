<?php

class DescriptionController extends Controller
{
    private $table = DB_TBDESCRIPTION;

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
        $this->_view->listItem = $this->_model->getItem();
        $this->_view->render($this->table . '/index');
    }

    // Add Ajax
    public function addAction()
    {
        if (isset($this->_arrParam['form'])) {
            $validate = new Validate($this->_arrParam['form']);
            $validate->addRule("course_id", 'status', ['deny' => [0]]);
            $validate->run();
            $this->_arrParam['form'] = $validate->getResult();
            $this->_view->infoItem = $this->_arrParam['form'];
            if ($validate->isValid() == false) {
                $this->_view->errors = $validate->showErrors();
            } else {
                $this->_model->insertItem($this->_arrParam['form']);
                $this->_view->success = Helper::success('Add Successful');
                if ($this->_arrParam['type'] == "close")
                    URL::redirect("admin", $this->table, "index");
                if ($this->_arrParam['type'] == "new")
                    $this->_view->infoItem = [];
            }
        }
        $this->_view->listCourse = $this->_model->showAll(DB_TBCOURSE);
        $this->_view->render($this->table . '/add');
    }

    // Edit Ajax
    public function editAction()
    {
        $this->_view->infoItem = $this->_model->select($this->table, $this->_arrParam['id'], 1);
        if (isset($this->_arrParam['form'])) {
            $validate = new Validate($this->_arrParam['form']);
            $validate->addRule("course_id", 'status', ['deny' => [0]]);
            $validate->run();
            $this->_arrParam['form'] = $validate->getResult();
            $this->_view->infoItem = $this->_arrParam['form'];
            if ($validate->isValid() == false) {
                $this->_view->errors = $validate->showErrors();
            } else {
                $id = $this->_arrParam['id'];
                $this->_model->updateItem($this->_arrParam['form'], ['id' => $id]);
                $this->_view->success = Helper::success('Edit Successful');
            }
        }
        $this->_view->listCourse = $this->_model->showAll(DB_TBCOURSE);
        $this->_view->render($this->table . '/edit');
    }


    // Delet Ajax
    public function deleteAction()
    {
        $this->_model->delete($this->table, $this->_arrParam['cid']);
        URL::redirect('admin', $this->table, 'index');
    }
}

?>

