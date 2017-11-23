<?php
class IndexController extends Controller
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
		if(!isset($_COOKIE['remember'])){
		    URL::redirect('admin','user','login');
        }else{
		    $arrCookies=unserialize($_COOKIE['remember']);

        }

		$this->_view->render('index/index');
	}

	

}
