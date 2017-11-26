<?php

class VideoController extends Controller
{
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
<<<<<<< HEAD
        $course_id = isset($this->_arrParam['id']) ? (int)$this->_arrParam['id'] : 0;
        $this->_view->listItem = $this->_model->showVideo($course_id);
        $this->_view->render('video/index');
    }

    public function addAjaxAction()
    {
        if (isset($this->_arrParam['form'])) {

            if (strlen($this->_arrParam['form']['link']) > 40) {
                $this->_arrParam['form']['link'] = Helper::cutCharacter($this->_arrParam['form']['link'], 'v=', 2);
            }
            $validate = new Validate($this->_arrParam['form']);
            $queryName = "SELECT * FROM `" . DB_TBVIDEO . "` WHERE `title`='" . $this->_arrParam['form']['title'] . "'";
            $queryLink = "SELECT * FROM `" . DB_TBVIDEO . "` WHERE `link`='" . $this->_arrParam['form']['link'] . "'";

            $validate->addRule('title', 'string-notExistRecord', ['min' => 1, 'max' => 200, 'database' => $this->_model, 'query' => $queryName])
                ->addRule('link', 'string-notExistRecord', ['min' => 10, 'max' => 200, 'database' => $this->_model, 'query' => $queryLink])
                ->addRule('course_id', 'status', ['deny' => [0]]);
            $validate->run();
            $this->_arrParam['form'] = $validate->getResult();
            $this->_view->infoItem = $this->_arrParam['form'];
            if ($validate->isValid() == false) {
                $this->_view->errors = $validate->showErrors();
            } else {
                $this->_model->insert(DB_TBVIDEO, $this->_arrParam['form']);
                $this->_view->success = Helper::success('Thêm thành công');
                $this->_view->infoItem = [];
            }
        }
        $this->_view->listCourse = $this->_model->showAll(DB_TBCOURSE);
        $this->_view->render('video/add', false);
    }

    public function editAjaxAction()
    {
        $this->_view->infoItem = $this->_model->select(DB_TBVIDEO, $this->_arrParam['id'], 1);

        if (isset($this->_arrParam['form'])) {
            $form = array_diff_assoc($this->_arrParam['form'], $this->_view->infoItem);
            if (isset($form['link']) && strlen($form['link']) > 40) {
                $form['link'] = Helper::cutCharacter($form['link'], 'list=', 5);
            }
            $validate = new Validate($form);
            foreach ($form as $key => $value) {
                switch ($key) {
                    case 'title':
                        $query = "SELECT * FROM `" . DB_TBVIDEO . "` WHERE `name`='" . $form['title'] . "'";
                        $validate->addRule('name', 'string-notExistRecord', ['min' => 1, 'max' => 200, 'database' => $this->_model, 'query' => $query]);
                        break;
                    case 'link':
                        $query = "SELECT * FROM `" . DB_TBVIDEO . "` WHERE `link`='" . $form['link'] . "'";
                        $validate->addRule('link', 'string-notExistRecord', ['min' => 1, 'max' => 200, 'database' => $this->_model, 'query' => $query]);
                        break;
                    case 'course_id':
                        $validate->addRule('course_id', 'status', ['deny' => [0]]);
                        break;
                }
            }
            $validate->run();
            $form = $validate->getResult();
            $this->_view->infoItem = array_merge($this->_view->infoItem, $form);
            if ($validate->isValid() == false) {
                $this->_view->errors = $validate->showErrors();
            } else {
                if (!empty($form)) {
                    $id = $this->_view->infoItem['id'];
                    $this->_model->update(DB_TBVIDEO, $form, ['id' => $id]);
                    $this->_view->success = Helper::success('Sửa thành công');

                } else {
                    $this->_view->success = Helper::success('Không thay đổi');
                }
            }
        }
        $this->_view->listCourse = $this->_model->showAll(DB_TBCOURSE);
        $this->_view->render('video/editVideo', false);
    }

    public function ajaxStatusAction()
    {
        echo json_encode($this->_model->chageStatus($this->_arrParam));
    }

    //Ajax
    public function statusAction()
    {
        $this->_model->chageStatus($this->_arrParam['cid'],$this->_arrParam['type'],"change-status");
        URL::redirect('admin','video','index',['id'=>$this->_arrParam['id']]);
    }

    //Ajax
    public function deleteAction()
    {
        $this->_model->deleteItem($this->_arrParam['cid']);
        URL::redirect('admin', 'video', 'index',['id'=>$this->_arrParam['id']]);
    }
=======
        $this->_view->render('course/index');
    }


>>>>>>> 1dab6ebfd7dcfbf8c36a164d56696b10e4ff86f5
}
