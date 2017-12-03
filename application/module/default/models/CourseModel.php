<?php
class CourseModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function videoQuery($where)
    {
        $queryVideo=array();
        $queryVideo[] = "SELECT `c`.`name`AS `name_category`,`cs`.`name` AS `name_course`,`v`.`id` AS `video_id`,`v`.`title`,`v`.`link`,`v`.`thumbnails`,`a`.`name` AS `name_author`";
        $queryVideo[]="FROM `course` AS `cs` INNER JOIN `video`AS`v` ON `cs`.`id`=`v`.`course_id`";
        $queryVideo[]="INNER JOIN `category` AS `c`ON `c`.`id`=`cs`.`category_id`";
        $queryVideo[]="INNER JOIN `author`   AS  `a` ON`a`.`id`=`cs`.`author_id`";
        $queryVideo[]= "WHERE `cs`.`id`=" . $where;
        $video = $this->execute(implode(" ",$queryVideo), true);
        return $video;
    }
    public function videoRelativeQuery($id,$name)
    {
        $query=array();

        $query[]="SELECT DISTINCT `c`.`id`AS `category_id`,`cs`.`id` AS `course_id`,`cs`.`name` AS  `name_course`,`a`.`name` AS `name_author`,`c`.`name`AS `name_category`";
        $query[]="FROM `course`AS`cs` INNER JOIN `category`AS`c` ON `c`.`id`=`cs`.`category_id`";
        $query[]="INNER JOIN `author` AS`a` ON `a`.id =`cs`.`author_id`";
        $query[]="WHERE `c`.`name`="."'".$name."' AND `cs`.`id`!=".$id;
        $category=$this->execute(implode(" ",$query),true);
        return $category;
    }

}
