<?php

class CategoryModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCourse($id)
    {
        $query[] = "SELECT DISTINCT `cs`.`name`AS `name_course`,`cs`.`id`AS `id_course`,`a`.`name` AS `name_author`";
        $query[] = "FROM `course` AS `cs`";
        $query[] = "JOIN `author` AS `a` ON `a`.id =`cs`.`author_id`";
        $query[] = "WHERE `cs`.`category_id`= $id";
        $query = implode(" ", $query);
        return $this->execute($query, 1);
    }
    public function getItemHeader()
    {
        $arrItem = [];
        $queryAuthor = "SELECT `id`,`name` FROM `" . DB_TBAUTHOR . "` ORDER BY `name` LIMIT 0,5";
        $arrItem[DB_TBAUTHOR] = $this->execute($queryAuthor, 1);
        $queryCategory = "SELECT `id`,`name` FROM `" . DB_TBCATEGORY . "` ORDER BY `name` LIMIT 0,5";
        $arrItem[DB_TBCATEGORY] = $this->execute($queryCategory, 1);
        $queryCourse = "SELECT `id`,`name` FROM `" . DB_TBCOURSE . "` ORDER BY `name` LIMIT 0,5";
        $arrItem[DB_TBCOURSE] = $this->execute($queryCourse, 1);
        return $arrItem;
    }
}