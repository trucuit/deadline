<?php

class IndexController extends Controller
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
        $category=array();
        $selectCategory="SELECT `name` FROM `category` ";
        $nameCategory=$this->_model->execute($selectCategory,true);
        foreach ($nameCategory as $value){
            foreach ($value as $value1) {

                $query = "SELECT DISTINCT `c`.`id` AS `id_category`,`c`.`name`AS `name_category`,`cs`.`name`AS `name_course`,`cs`.`id`AS `id_course`,`a`.`name` AS `name_author` FROM `course`AS`cs` INNER JOIN `category`AS`c` ON `c`.`id`=`cs`.`category_id`
                                                                      INNER JOIN `author` AS`a` ON `a`.id =`cs`.`author_id`
                                                                     WHERE `c`.`name`="."'". $value1."'";
                $this->_view->category[$value1] = $this->_model->execute($query, true);
            }

        }

        $this->_view->render('index/index');
    }

    public function loginAction()
    {
        $this->_view->render('index/login');
    }


}