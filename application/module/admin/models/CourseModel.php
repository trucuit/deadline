<?php

class CourseModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showCourse()
    {
        $query[] = "SELECT co.id,co.name,co.link,ca.name as 'category',co.created,co.created_by,co.modified,co.modified_by,co.status";
        $query[] = "FROM `" . DB_TBCOURSE . "` AS `co` LEFT JOIN `" . DB_TBCATEGORY . "` AS `ca`";
        $query[] = "ON `co`.category_id=`ca`.id";
//        $query[] = "UNION";
//        $query[] = "SELECT co.id,co.name,co.link,ca.name as 'category',co.created,co.created_by,co.modified,co.modified_by,co.status";
//        $query[] = "FROM `" . DB_TBCOURSE . "` AS `co` RIGHT JOIN `" . DB_TBCATEGORY . "` AS `ca`";
//        $query[] = "ON `co`.category_id=`ca`.id";
        $query = implode(" ", $query);
        return $this->execute($query, 1);
    }

    public function chageStatus($param)
    {
        $status = ($param['status'] == 0) ? 1 : 0;
        $modified_by = Session::get('login')['user']['username'];
        $modified = date('Y-m-d', time());
        $id = $param['id'];
        $query = "UPDATE `" . DB_TBCOURSE . "` SET `status` = $status, `modified` = '$modified', `modified_by` = '$modified_by' WHERE `id` = '" . $id . "'";

        $this->execute($query);

        $result = array(
            'id' => $id,
            'status' => $status,
            'link' => URL::createLink('admin', 'course', 'ajaxStatus', array('id' => $id, 'status' => $status))
        );
        return $result;
    }

}
