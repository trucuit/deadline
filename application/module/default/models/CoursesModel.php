<?php

class CoursesModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function videoQuery($where)
    {
        $queryVideo = "SELECT `c`.`name`AS `name_category`,`cs`.`name` AS `name_course`,`v`.`title`,`v`.`link`,`v`.`thumbnails`FROM `course` AS `cs` INNER JOIN `video`AS`v` ON `cs`.`id`=`v`.`course_id` 
                                                                                           INNER JOIN `category` AS `c`ON `c`.`id`=`cs`.`category_id`
                                                                                            WHERE `cs`.`id`=" . $where;
        $video = $this->execute($queryVideo, true);
        return $video;
    }
    public function videoRelativeQuery($where)
    {
        $query="SELECT DISTINCT `c`.`id`,`cs`.`name`,`a`.`name` AS `name_author` FROM `course`AS`cs` INNER JOIN `category`AS`c` ON `c`.`id`=`cs`.`category_id` 
                                                                      INNER JOIN `author` AS`a` ON `a`.id =`cs`.`author_id`
                                                                      WHERE `cs`.`id`!=".$where;
        $category=$this->execute($query,true);
        return $category;
    }

}
