<?php
class CoursesModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function videoQuery($where)
    {
        $queryVideo = "SELECT `c`.`name`AS `name_category`,`cs`.`name` AS `name_course`,`v`.`title`,`v`.`link`,`v`.`thumbnails`,`a`.`name` AS `name_author`FROM `course` AS `cs` INNER JOIN `video`AS`v` ON `cs`.`id`=`v`.`course_id` 
                                                                                           INNER JOIN `category` AS `c`ON `c`.`id`=`cs`.`category_id`
                                                                                           INNER JOIN `author`   AS  `a` ON`a`.`id`=`cs`.`author_id`
                                                                                            WHERE `cs`.`id`=" . $where;
        $video = $this->execute($queryVideo, true);
        return $video;
    }
    public function videoRelativeQuery($id,$name)
    {
        $query="SELECT DISTINCT `c`.`id`AS `category_id`,`cs`.`id` AS `course_id`,`cs`.`name` AS  `name_course`,`a`.`name` AS `name_author`,`c`.`name`AS `name_category`FROM `course`AS`cs` INNER JOIN `category`AS`c` ON `c`.`id`=`cs`.`category_id` 
                                                                      INNER JOIN `author` AS`a` ON `a`.id =`cs`.`author_id`
                                                                      WHERE `c`.`name`="."'".$name."' AND `cs`.`id`!=".$id;
        $category=$this->execute($query,true);
        return $category;
    }

}
