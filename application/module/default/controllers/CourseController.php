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


        $this->_view->video = $this->_model->videoQuery($this->_arrParam['id_course']);

        $this->_view->category = $this->_model->videoRelativeQuery($this->_arrParam['id_course'], $this->_view->video[0]['name_category']);

        $this->_view->render('course/index');
    }

    public function setCookieViewAction()
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

        if (isset($this->_arrParam['deleteId'])) {
            $delete = unserialize($_COOKIE['view']);
            for ($i = 0; $i < count($delete); $i++) {
                if ($delete[$i] == $this->_arrParam['deleteId']) {
                    unset($delete[$i]);

                }
            }
            setcookie('view', serialize($delete), time() + 3600 * 24 * 30);
        }

    }
}