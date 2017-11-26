<?php

class CategoryController extends Controller
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
        $this->_view->listCategory = $this->_model->showAll('category');
        $this->_view->render('category/index');
    }

    public function ajaxAddAction()
    {
        if (isset($this->_arrParam['form'])) {
            $this->_arrParam['form']['image'] = $_FILES['image'];
            $validate = new Validate($this->_arrParam['form']);
            $query = "SELECT * FROM `" . DB_TBCATEGORY . "` WHERE `name`='" . $this->_arrParam['form']['category'] . "'";
            $validate->addRule('category', 'string-notExistRecord', ['min' => 5, 'max' => 200, 'database' => $this->_model, 'query' => $query])
                ->addRule('image', 'file', ['min' => 1000, 'max' => 2097152, 'extension' => ['jpg', 'png', 'jpeg']], false);
            $validate->run();
            $this->_arrParam['form'] = $validate->getResult();
            if ($validate->isValid() == false) {
                $this->_view->errors = $validate->showErrors();

            } else {
                $this->_arrParam['form']['image'] = $_FILES['image'];
                $this->_model->insertCategory($this->_arrParam['form']);
                $this->_view->success = Helper::success('Thêm thành công');
            }
        }
        $this->_view->render('category/add');

    }

    public function ajaxStatusAction()
    {
        echo json_encode($this->_model->chageStatus($this->_arrParam));
    }

    public function ajaxEditCategoryAction()
    {
        if (isset($this->_arrParam['category'])) {
            $form['category'] = $this->_arrParam['category'];
            $form['id'] = $this->_arrParam['id'];
            $this->_arrParam['form'] = $form;
            $validate = new Validate($this->_arrParam['form']);
            $query = "SELECT * FROM `" . DB_TBCATEGORY . "` WHERE `name`='" . $this->_arrParam['form']['category'] . "' AND `id` <> '" . $this->_arrParam['form']['id'] . "'";
            if (!empty($_FILES)) {
                $this->_arrParam['form']['image'] = $_FILES['file'];
                $validate = new Validate($this->_arrParam['form']);
                $validate->addRule('image', 'file', ['min' => 6400, 'max' => 2097152, 'extension' => ['jpg', 'png', 'jpeg']], false);
            }
            $validate->addRule('category', 'string-notExistRecord', ['min' => 5, 'max' => 200, 'database' => $this->_model, 'query' => $query]);
            $validate->run();
            $this->_arrParam['form'] = $validate->getResult();
            if ($validate->isValid() == false) {
                $this->_view->errors = $validate->showErrors();
            } else {
                if (!isset($this->_arrParam['form']['image'])) {

                    $name = trim($this->_arrParam['form']['category']);
                    $modified = date('Y-m-d', time());
                    $modified_by = Session::get('login')['user']['username'];
                    $id = $this->_arrParam['id'];

                    $itemOld = $this->_model->select('category', $this->_arrParam['id'], true);
                    $image = $name . Helper::cutCharacter($itemOld['picture'], '.');
                    if ($itemOld['name'] != $this->_arrParam['form']['category']) {
                        $imgOld = TEMPLATE_PATH . "/admin/main/images/" . $itemOld['picture'];
                        $imgNew = TEMPLATE_PATH . "/admin/main/images/" . $image;
                        rename($imgOld, $imgNew);
                    }

                    $query = "UPDATE `" . DB_TBCATEGORY . "` SET `name`='$name',`picture`='$image',`modified`='$modified', `modified_by`='$modified_by' WHERE `id`='$id'";
                    $this->_model->execute($query, false);
                } else {
                    $this->_model->updateCategory($this->_arrParam['form']);
                }
                $this->_view->success = Helper::success('Cập nhật thành công');
            }
        }
        $this->_view->infoCategory = $this->_model->select('category', $this->_arrParam['id'], true);
        $this->_view->render('category/edit', false);
    }

    public function deleteAction()
    {
        $this->_model->delete(DB_TBCATEGORY, $this->_arrParam['id']);
        $this->_view->success = Helper::success('Xóa thành công');
        URL::redirect('admin', 'category', 'index');
    }
}