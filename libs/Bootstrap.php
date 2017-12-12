<?php

class Bootstrap
{
    private $_params;
    private $_controllerObj;

    public function __construct()
    {
        $this->setParam();

        $controllerName = ucfirst($this->_params['controller']) . 'Controller';
        $filePath = MODULE_PATH . DS . $this->_params['module'] . DS . 'controllers' . DS . $controllerName . '.php';
        if (file_exists($filePath)) {
            $this->loadFileExits($filePath, $controllerName);
            $this->callMethod();
        }
    }

    public function setParam()
    {
        $this->_params = array_merge($_GET, $_POST);
        $this->_params['module'] = isset($this->_params['module']) ? $this->_params['module'] : DEFAULT_MODULE;
        $this->_params['controller'] = isset($this->_params['controller']) ? $this->_params['controller'] : DEFAULT_CONTROLLER;
        $this->_params['action'] = isset($this->_params['action']) ? $this->_params['action'] : DEFAULT_ACTION;
    }

    public function loadFileExits($filePath, $controllerName)
    {
        include_once $filePath;
        $this->_controllerObj = new $controllerName($this->_params);
    }

    public function callMethod()
    {
        $actionName = $this->_params['action'] . 'Action';
        if (method_exists($this->_controllerObj, $actionName)) {
            $module = $this->_params['module'];
            $userInfo = Session::get('user');
            $logged = ($userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time());
//            echo "<pre>";
//            print_r($this->_params);
//            echo "</pre>";die;
            if ($module == 'default') {
                if ($logged == true) {
                    if ($this->_params['controller'] == 'index' && $this->_params['action'] == 'login') {
                        URL::redirect('admin', 'user', 'profile');
                    }
                    $this->_controllerObj->$actionName();
                } else {
                    $this->callLoginAction($module);
                }
            } else {
                $this->_controllerObj->$actionName();
            }

        } else {
            URL::redirect('default', 'index', 'index', null, 'trang-chu.html');
        }
    }

    private function callLoginAction($module = 'default')
    {
        Session::delete('user');
        require_once(MODULE_PATH . DS . $module . DS . 'controllers' . DS . 'IndexController.php');
        $indexController = new IndexController($this->_params);
        $indexController->loginAction();
    }

}
