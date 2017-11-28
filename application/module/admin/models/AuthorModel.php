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
            $nameImage = TEMPLATE_PATH . "/admin/main/images/" . $arrParam['name'] . "." . pathinfo($arrParam['avatar']['extension']);
            move_uploaded_file($arrParam['avatar']['tmp_name'], $nameImage);
            $arrParam['avatar'] = $arrParam['avatar']['name'];
        }
        $arrParam['created_by'] = Cookie::get('remember')['user'][0]['username'];
        $arrParam['created'] = date("Y-m-d", time());
        $this->insert(DB_TBAUTHOR, $arrParam);
    }

    public function updateAuthor($arrParam, $id)
    {
        if (isset($arrParam['avatar'])) {
            $nameImage = TEMPLATE_PATH . "/admin/main/images/" . $arrParam['name'] . "." . pathinfo($arrParam['avatar']['extension']);
            if (file_exists($nameImage)) {
                unlink($nameImage);
            }
            move_uploaded_file($arrParam['avatar']['tmp_name'], $nameImage);
            $arrParam['avatar'] = $arrParam['avatar']['name'];
        }
        $arrParam['modified_by'] = Cookie::get('remember')['user'][0]['username'];
        $arrParam['modified'] = date("Y-m-d", time());
        $this->update(DB_TBAUTHOR, $arrParam, ['id' => $id]);
    }
}