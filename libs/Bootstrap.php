<?php

class Bootstrap
{
    private $_params;
    private $_controllerObj;

    public function __construct()
    {
        $this->setParam();

        if ($this->_params['module'] == 'admin') {
            if (!Session::get('login')) {
                    if ($this->_params['action'] != 'login' || $this->_params['controller'] != 'user')
                    URL::redirect('admin', 'user', 'login');
            } else {
                if (Session::get('login')['time'] + TIME_LOGIN < time()) {
                    Session::delete('login');
                    URL::redirect('admin', 'user', 'login');
                }
            }
        }

        $controllerName = ucfirst($this->_params['controller']) . 'Controller';
        $filePath = MODULE_PATH . DS . $this->_params['module'] . DS . 'controllers' . DS . $controllerName . '.php';
        if (file_exists($filePath)) {
            $this->loadFileExits($filePath, $controllerName);
            $this->callMethod();
        }
    }

    public function setParam()
    {
        $this->_params = array_merge($_POST, $_GET);
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
            $this->_controllerObj->$actionName();
        }

    }
}
