<?php

class UserController extends Controller
{
    public function __construct($params)
    {
        parent::__construct($params);
        $this->_templateObj->setFolderTemplate('admin/main');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }


    public function profileAction()
    {
        $this->_templateObj->setFolderTemplate('admin/main');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('index.ini');
        $this->_templateObj->load();
        if (isset($this->_arrParam['form'])) {
            $validate = new Validate($this->_arrParam['form']);
            $validate->addRule('fullname', 'string', array('max' => 100, 'min' => 5))
                ->addRule('email', 'email');
            if (trim($this->_arrParam['form']['password']) != "") {
                $validate->addRule('password', 'password');
            }
            $validate->run();
            $this->_arrParam['form'] = $validate->getResult();
            if ($this->_arrParam['form']['password'] == null)
                unset($this->_arrParam['form']['password']);
            else {
                $this->_arrParam['form']['password'] = md5($this->_arrParam['form']['password']);
            }
            if ($validate->isValid() == false) {
                $this->_view->errors = $validate->showErrors();
            } else {
                $this->_model->update(DB_TBUSER, $this->_arrParam['form'], ['id' => unserialize($_COOKIE['remember'])['user'][0]['id']]);
                $this->_view->success = Helper::success('Cập nhật thành công');
                URL::redirect('admin', 'user', 'profile');
            }
        }
        $this->_view->userInfo = $this->_model->show(DB_TBUSER, Cookie::get('remember')['id']);
        $this->_view->render('user/profile');
    }
}
