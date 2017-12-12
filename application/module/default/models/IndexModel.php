<?php

class IndexModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllCategory()
    {
        $category = array();
        $selectCategory = "SELECT `name` FROM `category` ";
        $nameCategory = $this->execute($selectCategory, true);
        foreach ($nameCategory as $value) {
            foreach ($value as $value1) {
                $query = [];
                $query[] = "SELECT a.id as `author_id`,cs.image as `course_image`, a.avatar as `author_avatar`, `c`.`id` AS `category_id`,`c`.`name`AS `category_name`,`cs`.`name`AS `course_name`,`cs`.`id`AS `course_id`,`a`.`name` AS `author_name`";
                $query[] = "FROM `course`AS`cs`";
                $query[] = "JOIN `category`AS`c` ON `c`.`id`=`cs`.`category_id`";
                $query[] = "JOIN `author` AS`a` ON `a`.id =`cs`.`author_id`";
                $query[] = "WHERE `c`.`name`=" . "'" . $value1 . "'";
                $query = implode(" ", $query);
                $category[$value1] = $this->execute($query, true);
            }

        }
        return $category;
    }


    public function getIDNameCategory()
    {
        $query = "SELECT `id`,`name` FROM `" . DB_TBCATEGORY . "`";
        return $this->execute($query, 1);
    }

    public function getResultFind($arrParam)
    {
        $search = $arrParam['search'];
        if ($search == null) {
            return [];
        }
//        $find = $arrParam['find'];
        $query[] = "SELECT DISTINCT  a.id as `author_id`,a.avatar as `author_avatar`,cs.image as `course_image`,`c`.`id` AS `id_category`,`c`.`name`AS `name_category`,`cs`.`name`AS `name_course`,`cs`.`id`AS `id_course`,`a`.`name` AS `name_author`";
        $query[] = "FROM `course` AS `cs`";
        $query[] = "INNER JOIN `category` AS `c` ON `c`.`id`=`cs`.`category_id`";
        $query[] = "INNER JOIN `author` AS `a` ON `a`.id =`cs`.`author_id`";
        $query[] = "WHERE `cs`.`name` LIKE '%$search%'";
//        if ($arrParam['find'] == 0) {
//            $query[] = "WHERE `cs`.`name` LIKE '%$search%'";
//        } else {
//            $query[] = "WHERE `cs`.`name` LIKE '%$search%' AND `cs`.`category_id`='$find'";
//        }
        $query = implode(" ", $query);
        return $this->execute($query, 1);
    }

    public function getResultFindTag($tag)
    {
        $query[] = "SELECT DISTINCT a.id as `author_id`,a.id as `author_id`,a.avatar as  `author_avatar`,cs.image as `course_image`,`c`.`id` AS `id_category`,`c`.`name`AS `name_category`,`cs`.`name`AS `name_course`,`cs`.`id`AS `id_course`,`a`.`name` AS `name_author`";
        $query[] = "FROM `course` AS `cs`";
        $query[] = "INNER JOIN `category` AS `c` ON `c`.`id`=`cs`.`category_id`";
        $query[] = "INNER JOIN `author` AS `a` ON `a`.id =`cs`.`author_id`";
        $query[] = "WHERE `cs`.`name` LIKE '%$tag%'";
        $query = implode(" ", $query);
        return $this->execute($query, 1);
    }

    public function getResultFindAuthor($author_id)
    {
        $query[] = "SELECT DISTINCT a.id as `author_id`,a.avatar as  `author_avatar`,cs.image as `course_image`,`c`.`id` AS `id_category`,`c`.`name`AS `name_category`,`cs`.`name`AS `name_course`,`cs`.`id`AS `id_course`,`a`.`name` AS `name_author`";
        $query[] = "FROM `course` AS `cs`";
        $query[] = "INNER JOIN `category` AS `c` ON `c`.`id`=`cs`.`category_id`";
        $query[] = "INNER JOIN `author` AS `a` ON `a`.id =`cs`.`author_id`";
        $query[] = "WHERE `cs`.`author_id` = '$author_id'";
        $query = implode(" ", $query);
        return $this->execute($query, 1);
    }

    public function getStatistics()
    {
        $query = "SELECT count(id) as count FROM `" . DB_TBCATEGORY . "`";
        $arrItem[DB_TBCATEGORY] = $this->execute($query, 1)[0]['count'];
        $query = "SELECT count(id) as count FROM `" . DB_TBCOURSE . "`";
        $arrItem[DB_TBCOURSE] = $this->execute($query, 1)[0]['count'];
        $query = "SELECT count(id) as count FROM `" . DB_TBAUTHOR . "`";
        $arrItem[DB_TBAUTHOR] = $this->execute($query, 1)[0]['count'];
        $query = "SELECT count(id) as count FROM `" . DB_TBVIDEO . "`";
        $arrItem[DB_TBVIDEO] = $this->execute($query, 1)[0]['count'];
        return $arrItem;
    }

    public function getDataAutocomplete($param)
    {
        $result = [];
        $query1[] = "SELECT name";
        $query1[] = "FROM `" . DB_TBCATEGORY . "`";
        $query1[] = "WHERE name LIKE '%$param%'";
        $result[DB_TBCATEGORY] = $this->execute(implode(" ", $query1), 1);
        $query2[] = "SELECT name";
        $query2[] = "FROM `" . DB_TBAUTHOR . "`";
        $query2[] = "WHERE name LIKE '%$param%'";
        $result[DB_TBAUTHOR] = $this->execute(implode(" ", $query2), 1);
        $query3[] = "SELECT name";
        $query3[] = "FROM `" . DB_TBCOURSE . "`";
        $query3[] = "WHERE name LIKE '%$param%'";
        $result[DB_TBCOURSE] = $this->execute(implode(" ", $query3), 1);

        return $result;
    }

    public function checkExist($table, $param, $value)
    {
        $query[] = "SELECT *";
        $query[] = "FROM `$table`";
        $query[] = "WHERE  `$param` = '$value'";
        $query = implode(" ", $query);
        $result = $this->execute($query, 1);
        if (!empty($result))
            return $result[0];
        return 0;
    }

}
