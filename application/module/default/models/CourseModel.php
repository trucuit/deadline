<?php

class CourseModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function videoQuery($where)
    {
        $queryVideo = array();
        $queryVideo[] = "SELECT DISTINCT `cs`.`tag`,cs.image as `course_image`,a.avatar as `author_avatar`, `c`.`name`AS `name_category`,`cs`.`name` AS `name_course`,`v`.`id` AS `video_id`,`v`.`title`,`v`.`link`,`v`.`thumbnails`,`a`.`name` AS `name_author`";
        $queryVideo[] = "FROM `course` AS `cs` INNER JOIN `video`AS`v` ON `cs`.`id`=`v`.`course_id`";
        $queryVideo[] = "JOIN `category` AS `c`ON `c`.`id`=`cs`.`category_id`";
        $queryVideo[] = "JOIN `author`   AS  `a` ON`a`.`id`=`cs`.`author_id`";
        $queryVideo[] = "WHERE `cs`.`id`=" . $where;
        $queryVideo = implode(" ", $queryVideo);
        $video = $this->execute($queryVideo, true);
        return $video;

    }

    public function videoRelativeQuery($id, $name)
    {
        $query = array();
        $query[] = "SELECT DISTINCT cs.image as `course_image`,a.avatar as `author_avatar`,`c`.`id`AS `category_id`,`cs`.`id` AS `course_id`,`cs`.`name` AS  `name_course`,`a`.`name` AS `name_author`,`c`.`name`AS `name_category`";
        $query[] = "FROM `course`AS`cs` JOIN `category`AS`c` ON `c`.`id`=`cs`.`category_id`";
        $query[] = "JOIN `author` AS`a` ON `a`.id =`cs`.`author_id`";
        $query[] = "WHERE `c`.`name`=" . "'" . $name . "' AND `cs`.`id`!=" . $id;
        $category = $this->execute(implode(" ", $query), true);
        return $category;
    }

    public function getImageCourse($id_course)
    {
        $query[] = "SELECT co.image, co.name, de.description, co.github";
        $query[] = "FROM `" . DB_TBCOURSE . "` co";
        $query[] = "JOIN `" . DB_TBDESCRIPTION . "` de ON de.course_id=co.id";
        $query[] = "WHERE co.id=$id_course";
        $query = implode(" ", $query);
        return $this->execute($query, true)[0];
    }
}
