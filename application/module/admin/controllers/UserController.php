<?php

class UserController extends Controller
{
    /**
     * UserController constructor.
     * @param $params
     */
    public function __construct($params)
    {
        parent::__construct($params);
        $this->_templateObj->setFolderTemplate('admin/main');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }

    public function loginAction()
    {
        if (isset($this->_arrParam['form'])) {

            $validate = new Validate($this->_arrParam['form']);
            $queryUserName = "SELECT id,username,fullname,email FROM `user` WHERE username = '" . $this->_arrParam['form']['email'] . "' AND password='" . md5($this->_arrParam['form']['password']) . "'";
            $validate->addRule('email', 'existRecord', array('database' => $this->_model, 'query' => $queryUserName, 'min' => 3, 'max' => 25))
                ->addRule('password', 'password');
            $validate->run();
            $this->_arrParam['form'] = $validate->getResult();
            if ($validate->isValid() == false) {
                $this->_view->errors = $validate->showErrors();

            } else {

                if (isset($this->_arrParam['form']['check'])) {
                    setcookie('remember', serialize(['user' => $this->_model->execute($queryUserName)]), time() + TIME_LOGIN);
                } else {

                    setcookie('remember', serialize(['user' => $this->_model->execute($queryUserName)]), false);
                }

                URL::redirect('admin', 'index', 'index');
            }
        }
        $this->_view->render('user/login', false);
    }


    public function logoutAction()
    {
        Session::delete('login');
        URL::redirect('admin', 'user', 'login');
    }

    public function profileAction()
    {
        if (isset($this->_arrParam['form'])) {
            $validate = new Validate($this->_arrParam['form']);
            $validate->addRule('fullname', 'string', array('max' => 100, 'min' => 5))
                ->addRule('email', 'email')
                ->addRule('password', 'password');
            $validate->run();
            $this->_arrParam['form'] = $validate->getResult();
            if ($validate->isValid() == false) {
                $this->_view->errors = $validate->showErrors();
            } else {
                $query = "UPDATE `user` SET `username`='" . $this->_arrParam['form']['username'] . "',`fullname`='" . $this->_arrParam['form']['fullname'] . "', `email`='" . $this->_arrParam['form']['email'] . "', `password`='" . md5($this->_arrParam['form']['password']) . "'";
                $query .= " WHERE `id`=" . Session::get('login')['user'][0]['id'];
                $this->_model->execute($query);
                $this->_view->success = Helper::success('Cập nhật thành công');
            }
        }
        $this->_view->render('user/profile');
    }
}
