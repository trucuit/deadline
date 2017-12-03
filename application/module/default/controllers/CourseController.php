<?php


class CourseController extends Controller
{
    public function __construct($params)
    {
        parent::__construct($params);
        $this->_templateObj->setFolderTemplate('default/main');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }

    public function indexAction()
    {



        if (isset($this->_arrParam['videoId'])) {
            if (!isset($_COOKIE['view'])) {
                $viewed = array();
                array_unshift($viewed, $this->_arrParam['videoId']);
                setcookie('view', serialize($viewed), time() + 3600 * 24 * 30);
            } else {
                $review = unserialize($_COOKIE['view']);
                if (!in_array($this->_arrParam['videoId'], $review)) {
                    array_unshift($review, $this->_arrParam['videoId']);
                    setcookie('view', serialize($review), time() + 3600 * 24 * 30);
                }
            }
        }

        $this->_view->video = $this->_model->videoQuery($this->_arrParam['id']);

        $this->_view->category = $this->_model->videoRelativeQuery($this->_arrParam['id'], $this->_view->video[0]['name_category']);

        $this->_view->render('course/index');
    }


}