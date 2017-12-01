<?php
class IndexModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function homeQuery(){
        $category=array();
        $selectCategory="SELECT `name` FROM `category` ";
        $nameCategory=$this->execute($selectCategory,true);
        foreach ($nameCategory as $value){
            foreach ($value as $value1) {

                $query = "SELECT DISTINCT `c`.`id` AS `id_category`,`c`.`name`AS `name_category`,`cs`.`name`AS `name_course`,`cs`.`id`AS `id_course`,`a`.`name` AS `name_author` FROM `course`AS`cs` INNER JOIN `category`AS`c` ON `c`.`id`=`cs`.`category_id`
                                                                      INNER JOIN `author` AS`a` ON `a`.id =`cs`.`author_id`
                                                                     WHERE `c`.`name`="."'". $value1."'";
                $category[$value1] = $this->execute($query, true);
            }

        }
        return $category;
    }

}
