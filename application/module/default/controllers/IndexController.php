<?php

class IndexController extends Controller
{
    private $table = "index";

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
        $this->_view->listCategory = $this->_model->getAllCategory();
        $this->_view->listFindCourse = $this->_model->getIDNameCategory();
        $this->_view->statistics = $this->_model->getStatistics();
        $this->_view->render('index/index');
    }

    public function findAction()
    {
        $checkExist = $this->_model->checkExist(DB_TBCATEGORY, 'name', $this->_arrParam['form']['search']);
        if ($checkExist != 0) {
            $id_category = $checkExist['id'];
            $categoryURL = URL::filterURL($this->_arrParam['form']['search']);
            URL::redirect('default', 'category', 'showCourse', ['id' => $id_category], "$categoryURL-$id_category.html");
        }
        $checkExist = $this->_model->checkExist(DB_TBAUTHOR, 'name', $this->_arrParam['form']['search']);
        if ($checkExist != 0) {
            $author_id = $checkExist['id'];
            $nameAuthor = URL::filterURL($this->_arrParam['form']['search']);
            URL::redirect('default', 'index', 'findAuthor', ['author' => $nameAuthor, 'author_id' => $author_id], "tac-gia-$nameAuthor/$author_id.html");
        }

        $checkExist = $this->_model->checkExist(DB_TBCOURSE, 'name', $this->_arrParam['form']['search']);

        if ($checkExist != 0) {
            $name_category = $this->_model->select(DB_TBCATEGORY, $checkExist['category_id'], 1)['name'];
            $name_category = URL::filterURL($name_category);
            $id_category = $checkExist['category_id'];
            $name_course = URL::filterURL($this->_arrParam['form']['search']);
            $id_course = $checkExist['id'];
            URL::redirect('default', 'course', 'index', array('id_course' => $id_course, 'id_category' => $id_category), "$name_category/$name_course-$id_category-$id_course.html");
        }

        $this->_view->resultFind['list'] = $this->_model->getResultFind($this->_arrParam['form']);
        $this->_view->resultFind['search'] = $this->_arrParam['form']['search'];
//        if ($this->_arrParam['form']['find'] == 0) {
            $this->_view->resultFind['category'] = "All Category";
//        } else {
//            $this->_view->resultFind['category'] = $this->_model->select(DB_TBCATEGORY, $this->_arrParam['form']['find'], 1)['name'];
//        }
//
        $this->_view->render('find/index');
    }

    public function findTagAction()
    {
        $this->_view->resultFind['list'] = $this->_model->getResultFindTag($this->_arrParam['tag']);
        $this->_view->resultFind['search'] = $this->_arrParam['tag'];
        $this->_view->render('find/index');
    }

    public function findAuthorAction()
    {

        $this->_view->resultFind['list'] = $this->_model->getResultFindAuthor($this->_arrParam['author_id']);
        $this->_view->resultFind['search'] = $this->_model->select(DB_TBAUTHOR, $this->_arrParam['author_id'], 1)['name'];
        $this->_view->render('find/index');
    }

    public function loginAction()
    {
        $userInfo = Session::get('user');
        if ($userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time()) {
            URL::redirect('admin', 'index', 'index');
        }
        if (isset($this->_arrParam['form'])) {
            $validate = new Validate($this->_arrParam['form']);
            $queryUserName = "SELECT id,username,fullname,email FROM `user` WHERE username = '" . $this->_arrParam['form']['email'] . "' AND password='" . md5($this->_arrParam['form']['password']) . "'";
            $validate->addRule('email', 'existRecord', array('database' => $this->_model, 'query' => $queryUserName, 'min' => 3, 'max' => 25))
                ->addRule('password', 'password');
            $validate->run();
            $this->_arrParam['form'] = $validate->getResult();
            if ($validate->isValid() == false) {
                $this->_view->errors = "Invalid username or password.";
            } else {
                if (isset($this->_arrParam['form']['check']))
                    Session::set('user', ['login' => true, 'info' => $this->_model->execute($queryUserName, true)[0], 'time' => time() + 24 * 60 * 60]);
                else
                    Session::set('user', ['login' => true, 'info' => $this->_model->execute($queryUserName, true)[0], 'time' => time()]);
                URL::redirect('admin', DB_TBUSER, 'profile');
            }
        }
        $this->_view->render($this->table . "/login");
    }

    public function registerAction()
    {
        $this->_view->render($this->table . "/register");
    }

    public function findAutocomleteAction()
    {
        $data = $this->_model->getDataAutocomplete($this->_arrParam['param']);
        if (mb_strlen($this->_arrParam['param']) < 2)
            return [];
        $data = $this->_model->getDataAutocomplete($this->_arrParam['param']);
        foreach ($data as $key => $value) {
            foreach ($value as $i => $o) {
                if (isset($o['name']) && $this->_arrParam['param'] != null) {
                    $pos = mb_stripos(URL::vn_str_filter($o['name']), strtolower($this->_arrParam['param']));
                    $val = mb_substr($o['name'], $pos, mb_strlen($this->_arrParam['param']));
                    $data[$key][$i]['name_autocomplete'] = preg_replace("#$val#i", "<strong>$val</strong>", $o['name']);
                }
            }
        }
        $result = "<ul class='ui-menu ui-widget-content reponse'>";
        if (!empty($data[DB_TBCATEGORY])) {
            $result .= "<li class='ui-autocomplete-category'><i class=\"fa fa-tags\" aria-hidden=\"true\"></i>" . DB_TBCATEGORY . "</li>";
            foreach ($data[DB_TBCATEGORY] as $value) {
                $categoryURL = URL::filterURL($value['name']);
                $id_category = $value['id'];
                $urlCategory = URL::createLink('default', 'category', 'showCourse', ['id' => $id_category], "$categoryURL-$id_category.html");
                $result .= "<li class='ui-menu-item'><a href='".$urlCategory."'>" . $value['name_autocomplete'] . "</a></li>";
            }
        }
        if (!empty($data[DB_TBCOURSE])) {
            $result .= "<li class='ui-autocomplete-category'><i class=\"fa fa-book\" aria-hidden=\"true\"></i>" . DB_TBCOURSE . "</li>";
            foreach ($data[DB_TBCOURSE] as $value) {
                $name_category = URL::filterURL($value['category_name']);
                $id_category = $value['category_id'];
                $name_course = URL::filterURL($value['name']);
                $id_course = $value['course_id'];
                $urlCourse = URL::createLink('default', 'course', 'index', array('id_course' => $id_course, 'id_category' => $id_category), "$name_category/$name_course-$id_category-$id_course.html");
                $result .= "<li class='ui-menu-item' ><a href='".$urlCourse."'><img src='".$this->_view->_dirImg.'/course/'.$value['image']."' alt='' style='height:20px'>" . $value['name_autocomplete'] . "</a></li>";
            }
        }
        if (!empty($data[DB_TBAUTHOR])) {
            $result .= "<li class='ui-autocomplete-category'><i class=\"fa fa-user\" aria-hidden=\"true\"></i>" . DB_TBAUTHOR . "</li>";
            foreach ($data[DB_TBAUTHOR] as $value) {
                $nameAuthor = URL::filterURL($value['name']);
                $authorID = URL::filterURL($value['author_id']);
                $urlFindAuthor = URL::createLink('default', 'index', 'findAuthor', ['author' => $nameAuthor, 'author_id' => $authorID], "tac-gia-$nameAuthor/$authorID.html");
                $result .= "<li class='ui-menu-item'><a href='".$urlFindAuthor."'><img src='".$this->_view->_dirImg.'/author/'.$value['avatar']."' alt='' style='height:20px'>" . $value['name_autocomplete'] . "</a></li>";
            }
        }
        $result .= "</ul>";
        echo $result;
//        echo json_encode($result);
    }

}