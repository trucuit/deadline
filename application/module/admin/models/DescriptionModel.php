<?php

class DescriptionModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getItem()
    {
        $query[] = "SELECT de.id, co.id as `course_id`,de.description, co.name, de.created, de.created_by, de.modified, de.modified_by";
        $query[] = "FROM `" . DB_TBDESCRIPTION . "` de";
        $query[] = "JOIN `" . DB_TBCOURSE . "` `co` ON de.course_id = co.id";
        $query = implode(" ", $query);
        return $this->execute($query, 1);
    }

    public function updateItem($arrParam, $arrID)
    {
        $arrParam['description'] = trim($arrParam['description']);
        $arrParam['modified'] = date('Y-m-d');
        $arrParam['modified_by'] = Session::get("user")['info']['username'];
        $this->update(DB_TBDESCRIPTION, $arrParam, $arrID);
    }

    public function insertItem($arrParam)
    {
        $arrParam['description'] = trim($arrParam['description']);
        $arrParam['created'] = date('Y-m-d');
        $arrParam['created_by'] = Session::get("user")['info']['username'];
        $this->insert(DB_TBDESCRIPTION, $arrParam);
    }


}