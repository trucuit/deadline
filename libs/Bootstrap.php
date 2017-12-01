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

        echo "<pre>";
        print_r($this->_params);
        echo "</pre>";
    }

    public function setParam()
    {
        $url = array_merge($_POST, $_GET);
        if (isset($url['url'])) {
            $url = explode('/', $url['url']);
        }

        $this->_params = array_merge($_GET, $_POST);
        $this->_params['module'] = isset($url[0]) ? $url[0] : DEFAULT_MODULE;
        $this->_params['controller'] = isset($url[1]) ? $url[1] : DEFAULT_CONTROLLER;
        $this->_params['action'] = isset($url[2]) ? $url[2] : DEFAULT_ACTION;
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
//            if ($this->_params['module'] == 'admin') {
//                if (Cookie::get('remember')) {
//                    $this->_controllerObj->$actionName();
//                } else {
//                    $this->callLoginAction($this->_params['module']);
//                }
//            }
//        }else{
//            URL::redirect('admin','user','profile');
            $this->_controllerObj->$actionName();
        }else{
           URL::redirect('default','index','index');
        }
    }

    private function callLoginAction($module = 'default')
    {
        Session::delete('remember');
        require_once(MODULE_PATH . DS . $module . DS . 'controllers' . DS . 'IndexController.php');
        $indexController = new IndexController($this->_params);
        $indexController->loginAction();
    }
}
