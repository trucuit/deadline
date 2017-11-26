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

    public function ajaxAddAction()
    {
        echo "<pre>";
        print_r($this->_arrParam);
        echo "</pre>";
        if (isset($this->_arrParam['form'])) {
            $query = "SELECT * FROM `" . DB_TBCATEGORY . "` WHERE `name`='" . $this->_arrParam['form']['name'] . "'";
            $validate = new Validate($this->_arrParam['form']);
            $validate->addRule('name', 'string-notExistRecord', ['min' => 3, 'max' => 200, 'database' => $this->_model, 'query' => $query]);
            $validate->run();
            if ($validate->isValid() == false) {
                $this->_view->errors = $validate->showErrors();

            } else {
                $arrCategory = array();
                $arrCategory['name'] = $this->_arrParam['form']['name'];
                $arrCategory['status'] = $this->_arrParam['form']['status'];
                $this->_model->insertCategory($arrCategory);
                $this->_view->success = Helper::success("thêm thành công!");
            }
        }
        $this->_view->render('category/add', false);

    }

    public function ajaxActiveAction()
    {

        if (isset($this->_arrParam['cid'])) {

            $query = array();
            $exe = array();
            $data = array(

                "status" => "1"
            );
            foreach ($this->_arrParam['cid'] as $value) {
                $query[] = "SELECT `name`,`status` FROM `" . DB_TBCATEGORY . "` WHERE `id`='" . $value . "'";
                $this->_model->updateCategory($data, $value);
            }
            foreach ($query as $valueQuery) {
                $this->_view->exe[] = $this->_model->execute($valueQuery, true);

            }
            //if (isset($this->_arrParam['active'])) {
//                $data= array(
//                    "status"=> "1"
//                );
//
//                foreach ($this->_arrParam['cid'] as $value) {
//                    $this->_model->updateCategory($data,$value);
//
//                }

            //}
        }


        $this->_view->render('category/active', false);

    }



    public function ajaxInactiveAction()
    {

        if (isset($this->_arrParam['cid'])) {

            $query = array();
            $exe = array();
            $data = array(
                "status" => "0"
            );
            foreach ($this->_arrParam['cid'] as $value) {
                $query[] = "SELECT `name`,`status` FROM `" . DB_TBCATEGORY . "` WHERE `id`='" . $value . "'";
                $this->_model->updateCategory($data, $value);
            }
            foreach ($query as $valueQuery) {
                $this->_view->exe[] = $this->_model->execute($valueQuery, true);
            }
        }
        $this->_view->render('category/inActive', false);
    }

    public function ajaxDeleteAction()
    {

        if (isset($this->_arrParam['cid'])) {

            $query = array();
            $exe = array();

            foreach ($this->_arrParam['cid'] as $value) {
                $query[] = "SELECT `name`,`status` FROM `" . DB_TBCATEGORY . "` WHERE `id`='" . $value . "'";

            }
            foreach ($query as $valueQuery) {
                $this->_view->exe[] = $this->_model->execute($valueQuery, true);

            }
            foreach ($this->_arrParam['cid'] as $value) {
                $this->_model->delete(DB_TBCATEGORY, $value);

            }
        }

        $this->_view->render('category/delete', false);

    }

    public function ajaxStatusAction()
    {
        echo json_encode($this->_model->chageStatus($this->_arrParam));
    }

    public function ajaxEditCategoryAction()
    {


        if (isset($this->_arrParam['form'])) {
            $query = "SELECT * FROM `" . DB_TBCATEGORY . "` WHERE `name`='" . $this->_arrParam['form']['name'] . "'";
            $validate = new Validate($this->_arrParam['form']);
            $validate->addRule('name', 'string-notExistRecord', ['min' => 3, 'max' => 200, 'database' => $this->_model, 'query' => $query]);
            $validate->run();
            if ($validate->isValid() == false) {
                $this->_view->errors = $validate->showErrors();

            } else {
                $arrCategory = array();
                $arrCategory['name'] = $this->_arrParam['form']['name'];
                $arrCategory['status'] = $this->_arrParam['form']['status'];
                $this->_model->updateCategory($arrCategory,$this->_arrParam['form']['id']);
                $this->_view->success = Helper::success("Cập nhật thành công!");
            }
        }else{
            $this->_view->infoCategory = $this->_model->select('category', $this->_arrParam['id'], true);
        }


        $this->_view->render('category/edit', false);
    }

    public function deleteAction()
    {
        $this->_model->delete(DB_TBCATEGORY, $this->_arrParam['id']);
        $this->_view->success = Helper::success('Xóa thành công');
        URL::redirect('admin', 'category', 'index');
    }
}

?>

