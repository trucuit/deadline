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
        $modified_by = unserialize($_COOKIE['remember'])['user'][0]['username'];
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
        $arrParam['name'] = $arrParam['name'];
        $arrParam['created'] = date('Y-m-d', time());
        $arrParam['created_by'] = unserialize($_COOKIE['remember'])['user'][0]['username'];
        $this->insert(DB_TBCATEGORY, $arrParam);
    }


    public function updateCategory($arrParam, $where)
    {
        $arrCookie = unserialize($_COOKIE['remember']);
        $modified = date('Y-m-d', time());
        $modified_by = $arrCookie['user'][0]['username'];
        $status = $arrParam['status'];
        $id = $where;
        if (isset($arrParam['name'])) {
            $name = $arrParam['name'];
            $query = "UPDATE `".DB_TBCATEGORY."` SET `name`='$name', `modified`='$modified',`modified_by`='$modified_by',`status`='$status' WHERE `id`='$id'";

        } else {
            $query = "UPDATE `".DB_TBCATEGORY."` SET `modified`='$modified',`modified_by`='$modified_by',`status`='$status' WHERE `id`='$id'";

        }
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