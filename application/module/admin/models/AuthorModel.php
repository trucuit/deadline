<?php

class AuthorModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertAuthor($arrParam)
    {
        if (isset($arrParam['avatar'])) {
            $nameImage = $arrParam['name'] . "." . pathinfo($arrParam['avatar']['name'])['extension'];
            $pathImage = TEMPLATE_PATH . "/admin/main/images/" . $nameImage;
            move_uploaded_file($arrParam['avatar']['tmp_name'], $pathImage);
            $arrParam['avatar'] = $nameImage;
        }
        $arrParam['created_by'] = Cookie::get('remember')['username'];
        $arrParam['created'] = date("Y-m-d", time());
        $this->insert(DB_TBAUTHOR, $arrParam);
    }

    public function updateAuthor($arrParam, $id)
    {
        if (!empty($arrParam['avatar']['name'])) {
            $nameImage = $arrParam['name'] . "." . pathinfo($arrParam['avatar']['name'])['extension'];
            $pathImage = TEMPLATE_PATH . "/admin/main/images/" . $nameImage;
            if (file_exists(TEMPLATE_PATH . "/admin/main/images/" . $arrParam['avatarOld'])) {
                unlink(TEMPLATE_PATH . "/admin/main/images/" . $arrParam['avatarOld']);
            }
            move_uploaded_file($arrParam['avatar']['tmp_name'], $pathImage);
            $arrParam['avatar'] = $nameImage;
        }
        unset($arrParam['avatarOld']);
        $arrParam['modified_by'] = Cookie::get('remember')['username'];
        $arrParam['modified'] = date("Y-m-d", time());
        $this->update(DB_TBAUTHOR, $arrParam, ['id' => $id]);
    }

    public function chageStatus($param, $type = 1, $task = '')
    {
        $modified = date('Y-m-d', time());
        $modified_by = Cookie::get('remember')['username'];
        if ($task == "change-status") {
            foreach ($param as $val) {
                $query = "UPDATE `" . DB_TBAUTHOR . "` SET `status` = '$type',`modified`='$modified',`modified_by`='$modified_by' WHERE `id` = '" . $val . "'";
                $this->execute($query);
            }
        } else {
            $status = ($param['status'] == 0) ? 1 : 0;
            $id = $param['id'];
            $query = "UPDATE `" . DB_TBAUTHOR . "` SET `status` = '$status',`modified`='$modified',`modified_by`='$modified_by' WHERE `id` = '" . $id . "'";
            $this->execute($query);
            $result = array(
                'id' => $id,
                'status' => $status,
                'link' => URL::createLink('admin', DB_TBAUTHOR, 'ajaxStatus', array('id' => $id, 'status' => $status))
            );
            return $result;
        }
    }

    public function deleteItem($param)
    {
        foreach ($param as $val) {
            $item = $this->select(DB_TBAUTHOR, $val, 1);
            $nameImage = TEMPLATE_PATH . "/admin/main/images/" . $item['avatar'];
            if (file_exists($nameImage)) {
                unlink($nameImage);
            }
            $query = "DELETE FROM `" . DB_TBAUTHOR . "` WHERE `id`='$val'";
            $this->execute($query);

        }
    }
}