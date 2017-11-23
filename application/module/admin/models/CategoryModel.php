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
        $name = trim($arrParam['category']);
        $image = $name . Helper::cutCharacter($arrParam['image']['name'], '.');
        $created = date('Y-m-d', time());
        $created_by = Session::get('login')['user']['username'];
        $status = 0;
        $query[] = "INSERT INTO `" . DB_TBCATEGORY . "`";
        $query[] = "(`name`, `picture`, `created`, `created_by`, `status`)";
        $query[] = "VALUES ('$name','$image','$created','$created_by','$status')";
        $query = implode(' ', $query);
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $nameImage = TEMPLATE_PATH . "/admin\main\images/" . $image;
        move_uploaded_file($arrParam['image']['tmp_name'], $nameImage);
        return $stmt->rowCount();
    }


    public function updateCategory($arrParam)
    {

        $name = $arrParam['category'];
        $image = $name . Helper::cutCharacter($arrParam['image']['name'], '.');
        $modified = date('Y-m-d', time());
        $modified_by = Session::get('login')['user']['username'];
        $id = $arrParam['id'];

        $itemOld = $this->select('category', $id, true);
        $path = TEMPLATE_PATH . "/admin/main/images/" . $itemOld['picture'];
        unset($path);

        $query = "UPDATE `category` SET `name`='$name',`picture`='$image',`modified`='$modified',`modified_by`='$modified_by' WHERE `id`='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $nameImage = TEMPLATE_PATH . "/admin\main\images/" . $image;
        move_uploaded_file($arrParam['image']['tmp_name'], $nameImage);

    }

    public function selectItemLast($table)
    {
        return $this->show("SELECT `id` FROM `$table` ORDER BY `id` DESC");
    }

}