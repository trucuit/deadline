<?php


class CoursesController extends Controller
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


        $queryVideo="SELECT `c`.`name`AS `name_category`,`cs`.`name` AS `name_course`,`v`.`title`,`v`.`link`,`v`.`thumbnails`FROM `course` AS `cs` INNER JOIN `video`AS`v` ON `cs`.`id`=`v`.`course_id` 
                                                                                           INNER JOIN `category` AS `c`ON `c`.`id`=`cs`.`category_id`
                                                                                            WHERE `cs`.`id`=".$this->_arrParam['id'];
        $query="SELECT DISTINCT `c`.`id`,`cs`.`name`,`a`.`name` AS `name_author` FROM `course`AS`cs` INNER JOIN `category`AS`c` ON `c`.`id`=`cs`.`category_id` 
                                                                      INNER JOIN `author` AS`a` ON `a`.id =`cs`.`author_id`
                                                                      WHERE `cs`.`id`!=".$this->_arrParam['id'];
        $this->_view->category=$this->_model->execute($query,true);
        $this->_view->video=$this->_model->execute($queryVideo,true);
        $this->_view->render('courses/index');
    }



}