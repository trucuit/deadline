<?php

class CourseModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showCourse()
    {
        $query[] = "SELECT COUNT(v.course_id) as 'total_video',co.id,co.name,co.link,ca.name as 'category',co.created,co.created_by,co.modified,co.modified_by,co.status, co.image, au.name as `author`";
        $query[] = "FROM `" . DB_TBCOURSE . "` AS `co`";
        $query[] = "LEFT JOIN `" . DB_TBCATEGORY . "` AS `ca` ON `co`.category_id=`ca`.id";
        $query[] = "JOIN `" . DB_TBVIDEO . "` AS `v` ON v.course_id=co.id";
        $query[] = "LEFT JOIN `" . DB_TBAUTHOR . "` AS `au` ON co.author_id=au.id";
        $query[] = "GROUP BY co.id";
//        SELECT COUNT(v.course_id), c.id FROM
//`video` as v JOIN `course` as c ON v.course_id = c.id
//JOIN `category` ca ON v.course_id  = c.id
//GROUP BY c.id
//        $query[] = "UNION";
//        $query[] = "SELECT co.id,co.name,co.link,ca.name as 'category',co.created,co.created_by,co.modified,co.modified_by,co.status";
//        $query[] = "FROM `" . DB_TBCOURSE . "` AS `co` RIGHT JOIN `" . DB_TBCATEGORY . "` AS `ca`";
//        $query[] = "ON `co`.category_id=`ca`.id";
        $query = implode(" ", $query);
        return $this->execute($query, 1);
    }

    public function chageStatus($param, $type = 1, $task = '')
    {
        $modified = date('Y-m-d', time());
        $modified_by = Cookie::get('remember')['username'];
        if ($task == "change-status") {
            foreach ($param as $val) {
                $query = "UPDATE `" . DB_TBCOURSE . "` SET `status` = '$type',`modified`='$modified',`modified_by`='$modified_by' WHERE `id` = '" . $val . "'";
                $this->execute($query);
            }
        } else {
            $status = ($param['status'] == 0) ? 1 : 0;
            $id = $param['id'];
            $query = "UPDATE `" . DB_TBCOURSE . "` SET `status` = '$status',`modified`='$modified',`modified_by`='$modified_by' WHERE `id` = '" . $id . "'";
            $this->execute($query);
            $result = array(
                'id' => $id,
                'status' => $status,
                'link' => URL::createLink('admin', 'course', 'ajaxStatus', array('id' => $id, 'status' => $status))
            );
            return $result;
        }
    }

    public function insertCourse($data)
    {

        $image = $data['image'];
        $data['image'] = $data['name'] . '.' . Helper::cutCharacter($image['type'], '/', 1);
        $data['created'] = date("Y-m-d H:i:s");
        $data['name'] = trim($data['name']);
        $data['created_by'] = Cookie::get('remember')['username'];
        $this->insert(DB_TBCOURSE, $data);

        $query = "SELECT `id` FROM `" . DB_TBCOURSE . "` ORDER BY `id` DESC LIMIT 0,1";
        $bl = $this->insertVideo($data['link'], $this->execute($query, 1)[0]['id']);
        if ($bl == 0)
            return 0;

        $nameImage = TEMPLATE_PATH . "/admin/main/images/" . $data['image'];
        move_uploaded_file($image['tmp_name'], $nameImage);
        return 1;

    }

    public function updateCourse($data, $file)
    {
        if (isset($data['link']) && strlen($data['link']) > 40) {
            $data['link'] = Helper::cutCharacter($data['link'], 'list=', 5);
        }
        $data['modified'] = date('Y-m-d');
        $data['modified_by'] = Cookie::get('remember')['username'];
        $id = $data['id'];
        unset($data['id']);
        if (!empty($file['image']['name'])) {
            $imageOld = TEMPLATE_PATH . "/admin/main/images/" . $data['image'];
            $data['image'] = $data['name'] . '.' . pathinfo($file['image']['name'])['extension'];
            $imageNew = TEMPLATE_PATH . "/admin/main/images/" . $data['image'];
            if (file_exists($imageOld))
                unlink($imageOld);
            move_uploaded_file($file['image']['tmp_name'], $imageNew);
        }
        $this->update(DB_TBCOURSE, $data, ['id' => $id]);
        if (isset($data['link'])) {
            $this->deleteVideo(['id' => $id]);
            $this->insertVideo($data['link'], $id);
        }
    }

    public function insertVideo($link, $id)
    {
        $data = $this->getVideo($link);
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $val['link'] = $value['id'];
                $val['course_id'] = $id;
                $val['title'] = $value['title'];
                $val['thumbnails'] = $value['thumbnails'];
                $val['ordering'] = $key + 1;
                $this->insert(DB_TBVIDEO, $val);
            }
            return 1;
        }
        return 0;
    }

    public function deleteVideo($course_id)
    {
        $query = "DELETE FROM `" . DB_TBVIDEO . "` WHERE `course_id`='$course_id'";
        $this->execute($query);
    }

    public function createURL($arrURL)
    {
        $strURL = '';
        foreach ($arrURL as $key => $value) {
            $strURL .= '&' . $key . '=' . $value;
        }
        return ltrim($strURL, '&');
    }

    public function createSlug($value)
    {
        /*a à ả ã á ạ ă ằ ẳ ẵ ắ ặ â ầ ẩ ẫ ấ ậ b c d đ e è ẻ ẽ é ẹ ê ề ể ễ ế ệ
         f g h i ì ỉ ĩ í ị j k l m n o ò ỏ õ ó ọ ô ồ ổ ỗ ố ộ ơ ờ ở ỡ ớ ợ
        p q r s t u ù ủ ũ ú ụ ư ừ ử ữ ứ ự v w x y ỳ ỷ ỹ ý ỵ z*/
        $value = trim($value);
        $value = str_replace(' ', '-', $value);
        $value = preg_replace('#(-)+#', '-', $value);

        $value = mb_strtolower($value, 'UTF-8');

        $characterA = '#(a|à|ả|ã|á|ạ|ă|ằ|ẳ|ẵ|ắ|ặ|â|ầ|ẩ|ẫ|ấ|ậ)#imsU';
        $replaceA = 'a';
        $value = preg_replace($characterA, $replaceA, $value);

        $characterD = '#(đ|Đ)#imsU';
        $replaceD = 'd';
        $value = preg_replace($characterD, $replaceD, $value);

        $characterE = '#(è|ẻ|ẽ|é|ẹ|ê|ề|ể|ễ|ế|ệ)#imsU';
        $replaceE = 'e';
        $value = preg_replace($characterE, $replaceE, $value);

        $characterI = '#(ì|ỉ|ĩ|í|ị)#imsU';
        $replaceI = 'i';
        $value = preg_replace($characterI, $replaceI, $value);

        $charaterO = '#(ò|ỏ|õ|ó|ọ|ô|ồ|ổ|ỗ|ố|ộ|ơ|ờ|ở|ỡ|ớ|ợ)#imsU';
        $replaceCharaterO = 'o';
        $value = preg_replace($charaterO, $replaceCharaterO, $value);

        $charaterU = '#(ù|ủ|ũ|ú|ụ|ư|ừ|ử|ữ|ứ|ự)#imsU';
        $replaceCharaterU = 'u';
        $value = preg_replace($charaterU, $replaceCharaterU, $value);

        $charaterY = '#(ỳ|ỷ|ỹ|ý)#imsU';
        $replaceCharaterY = 'y';
        $value = preg_replace($charaterY, $replaceCharaterY, $value);

        $charaterSpecial = '#(,|$)#imsU';
        $replaceSpecial = '';
        $value = preg_replace($charaterSpecial, $replaceSpecial, $value);


        return $value;
    }

    public function getVideo($playlistID)
    {
        $items = [];
        $nextPageToken = '';
        do {
            $strURL = $this->createURL([
                'part' => 'snippet',
                'playlistId' => $playlistID,
                'key' => API_KEY,
                'maxResults' => 15,
                'pageToken' => $nextPageToken
            ]);
            $dataReturn = json_decode(file_get_contents(API_URL . 'playlistItems?' . $strURL), true);
            if ($dataReturn['items']) {
                foreach ($dataReturn['items'] as $key => $value) {
                    $snippet = $value['snippet'];
                    $items[] = [
                        'id' => $snippet['resourceId']['videoId'],
                        'title' => $snippet['title'],
                        'thumbnails' => $snippet['thumbnails']['maxres']['url'],
                    ];
                }
            }

            $nextPageToken = isset($dataReturn['nextPageToken']) ? $dataReturn['nextPageToken'] : '';
        } while ($nextPageToken != '');
        return $items;
    }

    public function deleteItem($param)
    {
        foreach ($param as $val) {
            $item = $this->select(DB_TBCOURSE, $val, 1);
            $nameImage = TEMPLATE_PATH . "/admin/main/images/" . $item['image'];
            if (file_exists($nameImage)) {
                unlink($nameImage);
            }
            $query = "DELETE FROM `" . DB_TBCOURSE . "` WHERE `id`='$val'";
            $this->execute($query);

        }
        foreach ($param as $val) {
            $this->deleteVideo($val);
        }
    }
}

