<?php

class IndexController extends Controller
{
    public function __construct($params)
    {
        parent::__construct($params);
        $this->_templateObj->setFolderTemplate('admin/main');
        $this->_templateObj->setFileTemplate('login.php');
        $this->_templateObj->setFileConfig('login.ini');
        $this->_templateObj->load();
    }

    public function loginAction()
    {
        if (Cookie::get('remember')) {
//            echo URL::createLink('admin', 'category', 'index');
            URL::redirect('admin', 'user', 'profile');
        }

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
//                if (isset($this->_arrParam['form']['check'])) {
//                    setcookie('remember', serialize(['user' => $this->_model->execute($queryUserName, true)]), time() + TIME_LOGIN);
//                    Cookie::set('remember', $this->_model->execute($queryUserName, true)[0], time() + TIME_LOGIN);
//                } else {
//                    setcookie('remember', serialize(['user' => $this->_model->execute($queryUserName, true)]), false);
//                    Cookie::set('remember', $this->_model->execute($queryUserName, true)[0], false);
//                }
                Cookie::set('remember', $this->_model->execute($queryUserName, true)[0], time() + TIME_LOGIN);
                URL::redirect('admin', DB_TBUSER, 'profile');
            }
        }
        $this->_view->render('index/login');
    }


    public function logoutAction()
    {
        Cookie::delete('remember');
        URL::redirect('admin', 'index', 'login');
    }


}
