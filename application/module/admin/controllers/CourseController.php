<?php

class CourseController extends Controller
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
        $this->_view->listCourse = $this->_model->showCourse();
        $this->_view->render('course/index');
    }

    public function addAjaxAction()
    {
        if (isset($this->_arrParam['form'])) {
            if (strlen($this->_arrParam['form']['link']) > 40) {
                $this->_arrParam['form']['link'] = Helper::cutCharacter($this->_arrParam['form']['link'], 'list=', 5);
            }
            $validate = new Validate($this->_arrParam['form']);
            $queryName = "SELECT * FROM `" . DB_TBCOURSE . "` WHERE `name`='" . $this->_arrParam['form']['name'] . "'";
            $queryLink = "SELECT * FROM `" . DB_TBCOURSE . "` WHERE `link`='" . $this->_arrParam['form']['link'] . "'";
            if (isset($_FILES['image'])) {
                $this->_arrParam['form']['image'] = $_FILES['image'];
                $validate = new Validate($this->_arrParam['form']);
                $validate->addRule('image', 'file', ['min' => 1000, 'max' => 2097152, 'extension' => ['jpg', 'png', 'jpeg']], false);
            }
            $validate->addRule('name', 'string-notExistRecord', ['min' => 1, 'max' => 200, 'database' => $this->_model, 'query' => $queryName])
                ->addRule('link', 'string-notExistRecord', ['min' => 10, 'max' => 200, 'database' => $this->_model, 'query' => $queryLink])
                ->addRule('category_id', 'status', ['deny' => [0]]);
            $validate->run();
            $this->_arrParam['form'] = $validate->getResult();
            $this->_view->infoItem = $this->_arrParam['form'];
            if ($validate->isValid() == false || !isset($_FILES['image'])) {
                if ($validate->getError() != null) {
                    if (isset($_FILES['image']))
                        $this->_view->errors = $validate->showErrors();
                    else
                        $this->_view->errors = $validate->showErrors('<b>Image</b>: Chưa chọn hình ảnh');
                } else
                    $this->_view->errors = Helper::showErrors("<b>Image</b>: Chưa chọn hình ảnh");
            } else {
                $bl = $this->_model->insertCourse($this->_arrParam['form']);
                if ($bl == 0) {
                    $this->_view->errors = Helper::showErrors('Link không hợp lệ');
                    $query = "SELECT `id` FROM `" . DB_TBCOURSE . "` ORDER BY `id` DESC LIMIT 0,1";
                    $this->_model->delete(DB_TBCOURSE,[$this->_model->execute($query, 1)[0]['id']]);
                } else {
                    $this->_view->success = Helper::success('Thêm thành công');
                    $this->_view->infoItem = [];
                }
            }
        }

        $this->_view->listCategory = $this->_model->showAll(DB_TBCATEGORY);
        $this->_view->render('course/add', false);
    }

    public function ajaxStatusAction()
    {
        echo json_encode($this->_model->chageStatus($this->_arrParam));
    }

    //Ajax
    public function deleteAction()
    {
        if (isset($this->_arrParam['cid'])) {
            $this->_model->deleteItem($this->_arrParam['cid']);
        }
        URL::redirect('admin', 'course', 'index');
    }

    public function ajaxEditAction()
    {
        $this->_view->infoItem = $this->_model->select(DB_TBCOURSE, $this->_arrParam['id'], 1);
        if (isset($this->_arrParam['form'])) {
            $form = array_diff_assoc($this->_arrParam['form'], $this->_view->infoItem);
            if (isset($form['link'])) {
                $form['link'] = Helper::cutCharacter($form['link'], 'list=', 5);
            }
            if (isset($_FILES['image'])) {
                $form['image'] = $_FILES['image'];
            }
            $validate = new Validate($form);
            foreach ($form as $key => $value) {
                switch ($key) {
                    case 'name':
                        $query = "SELECT * FROM `" . DB_TBCOURSE . "` WHERE `name`='" . $form['name'] . "'";
                        $validate->addRule('name', 'string-notExistRecord', ['min' => 1, 'max' => 200, 'database' => $this->_model, 'query' => $query]);
                        break;
                    case 'link':
                        $query = "SELECT * FROM `" . DB_TBCOURSE . "` WHERE `link`='" . $form['link'] . "'";
                        $validate->addRule('link', 'string-notExistRecord', ['min' => 1, 'max' => 200, 'database' => $this->_model, 'query' => $query]);
                        break;
                    case 'category_id':
                        $validate->addRule('category_id', 'status', ['deny' => [0]]);
                        break;
                    case 'image':
                        $validate->addRule('image', 'file', ['min' => 1000, 'max' => 2097152, 'extension' => ['jpg', 'png', 'jpeg']], false);
                        break;
                }
            }
            $validate->run();
            $form = $validate->getResult();
            unset($form['image']);
            $this->_view->infoItem = array_merge($this->_view->infoItem, $form);

            if ($validate->isValid() == false) {
                $this->_view->errors = $validate->showErrors();
            } else {
                $form['id'] = $this->_view->infoItem['id'];
                $form['image'] = $this->_view->infoItem['image'];
                $form['name'] = $this->_view->infoItem['name'];
                $this->_model->updateCourse($form, $_FILES);
                $this->_view->success = Helper::success('Sửa thành công');
            }
        }

        $this->_view->listCategory = $this->_model->showAll(DB_TBCATEGORY);
        $this->_view->render('course/editCourse', false);
    }

    //Ajax
    public function statusAction()
    {
        $this->_model->chageStatus($this->_arrParam['cid'], $this->_arrParam['type'], "change-status");
        URL::redirect('admin', 'course', 'index');
    }

    public function ajaxEditCourseAction()
    {
        if (isset($this->_arrParam['form'])) {
            $this->_arrParam['form']['id'] = $this->_arrParam['id'];
            $validate = new Validate($this->_arrParam['form']);
            $queryName = "SELECT * FROM `" . DB_TBCOURSE . "` WHERE `name`='" . $this->_arrParam['form']['name'] . "' AND `id` <> '" . $this->_arrParam['form']['id'] . "'";
            $queryLink = "SELECT * FROM `" . DB_TBCOURSE . "` WHERE `name`='" . $this->_arrParam['form']['link'] . "' AND `id` <> '" . $this->_arrParam['form']['id'] . "'";

            $validate->addRule('name', 'string-notExistRecord', ['min' => 1, 'max' => 200, 'database' => $this->_model, 'query' => $queryName])
                ->addRule('link', 'string-notExistRecord', ['min' => 1, 'max' => 200, 'database' => $this->_model, 'query' => $queryLink])
                ->addRule('category_id', 'status', ['deny' => [0]]);
            $validate->run();
            $this->_arrParam['form'] = $validate->getResult();
            if ($validate->isValid() == false) {
                $this->_view->errors = $validate->showErrors();
            } else {
                $form = $this->_arrParam['form'];
                unset($form['id']);
                $this->_model->update(DB_TBCOURSE, $form, ['id' => $this->_arrParam['form']['id']]);
                $this->_view->success = Helper::success('Cập nhật thành công');
            }
        }
        $this->_view->listCategory = $this->_model->showAll(DB_TBCATEGORY);
        $this->_view->infoCourse = $this->_model->select(DB_TBCOURSE, $this->_arrParam['id'], true);
        $this->_view->render('course/editCourse', false);
    }


}
