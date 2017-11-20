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
		if(!Session::get('login')){
			URL::redirect('admin','user','login');
		}
		$this->_view->render('index/index');
	}

	

}
