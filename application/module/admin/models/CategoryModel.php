<?php

class CategoryModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function chageStatus($param)
    {
        $status = ($param['status'] == 0) ? 1 : 0;
        $modified_by = Session::get('login')['user']['username'];
        $modified = date('Y-m-d', time());
        $id = $param['id'];
        $query = "UPDATE `" . DB_TBCATEGORY . "` SET `status` = $status, `modified` = '$modified', `modified_by` = '$modified_by' WHERE `id` = '" . $id . "'";

        $this->execute($query);

        $result = array(
            'id' => $id,
            'status' => $status,
            'link' => URL::createLink('admin', 'category', 'ajaxStatus', array('id' => $id, 'status' => $status))
        );
        return $result;
    }

    public function insertCategory($arrParam)
    {
        $arrCookie = unserialize($_COOKIE['remember']);
        $name = trim($arrParam['name']);
        $created = date('Y-m-d H:i:s', time());
        $created_by = $arrCookie['user'][0]['username'];
        $status = $arrParam['status'];
        $query[] = "INSERT INTO `" . DB_TBCATEGORY . "`";
        $query[] = "(`name`, `created`, `created_by`, `status`)";
        $query[] = "VALUES ('$name','$created','$created_by','$status')";

        $query = implode(' ', $query);
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

    }


    public function updateCategory($arrParam, $where)
    {
        $arrCookie = unserialize($_COOKIE['remember']);
        //$name = $arrParam['category'];
        $modified = date('Y-m-d H:i:s', time());
        $modified_by = $arrCookie['user'][0]['username'];
        $status = $arrParam['status'];
        $id = $where;

        $query = "UPDATE `category` SET `modified`='$modified',`modified_by`='$modified_by',`status`='$status' WHERE `id`='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();


    }

    public function deleteCategory($table, $id)
    {
        $stmt = $this->conn->prepare("DELETE FROM `$table` WHERE id=:id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function selectItemLast($table)
    {
        return $this->show("SELECT `id` FROM `$table` ORDER BY `id` DESC");
    }

}