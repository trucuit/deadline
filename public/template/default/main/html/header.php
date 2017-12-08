<?php
$url = [
    'login' => URL::createLink('admin', 'index', 'login', null, "dang-nhap.html"),
    'home' => URL::createLink("default", "index", "index", null, "trang-chu.html")
];
$model = new Model();
$arrCourseHeader = [];
$queryCourse[] = "SELECT co.id as `id_course`,co.name as `name_course`, ca.id as `id_category`, ca.name as `name_category` FROM `" . DB_TBCOURSE . "` as `co`";
$queryCourse[] = "JOIN `" . DB_TBCATEGORY . "` as `ca` ON co.category_id = ca.id";
$queryCourse[] = "ORDER BY co.`name` LIMIT 0,5";
$queryCourse = implode(" ", $queryCourse);
$arrCourseHeader[DB_TBCOURSE] = $model->execute($queryCourse, 1);

$queryCategory = "SELECT `id`,`name` FROM `" . DB_TBCATEGORY . "` ORDER BY `name` LIMIT 0,5";
$arrCourseHeader[DB_TBCATEGORY] = $model->execute($queryCategory, 1);

$queryAuthor = "SELECT `id`,`name` FROM `" . DB_TBAUTHOR . "` ORDER BY `name` LIMIT 0,5";
$arrCourseHeader[DB_TBAUTHOR] = $model->execute($queryAuthor, 1);

$queryCategory = "SELECT `id`,`name` FROM `" . DB_TBTAG . "` ORDER BY `name` LIMIT 0,5";
$arrCourseHeader[DB_TBTAG] = $model->execute($queryCategory, 1);

$xhtmlCourse = "";
foreach ($arrCourseHeader as $key => $val) {
    switch ($key) {
        case DB_TBCATEGORY:
            $xhtmlCourse .= '<li class="menu-item-has-children" style="width: 30%">';
            break;
        case DB_TBCOURSE:
            $xhtmlCourse .= '<li class="menu-item-has-children" style="width: 35%">';
            break;
        case DB_TBAUTHOR:
            $xhtmlCourse .= '<li class="menu-item-has-children" style="width: 22%">';
            break;
        case DB_TBTAG:
            $xhtmlCourse .= '<li class="menu-item-has-children" style="width: 13%">';
            break;

    }

    if ($key == DB_TBCATEGORY || $key == DB_TBCOURSE)
        $xhtmlCourse .= '<a href="#">' . "Top&nbsp;" . ucfirst($key) . '</a>';
    else
        $xhtmlCourse .= '<a href="#">' . ucfirst($key) . '</a>';
    $xhtmlCourse .= '<ul class="sub-menu">';
    foreach ($val as $o) {
        if ($key == DB_TBCATEGORY) {
            $categoryURL = URL::filterURL($o['name']);
            $id_category = $o['id'];
            $urlCategory = URL::createLink('default', 'category', 'showCourse', ['id' => $id_category], "$categoryURL-$id_category.html");
            $xhtmlCourse .= '<li><a href="' . $urlCategory . '">' . $o['name'] . '</a></li>';
        } elseif ($key == DB_TBCOURSE) {

            $name_category = URL::filterURL($o['name_category']);
            $id_category = $o['id_category'];
            $name_course = URL::filterURL($o['name_course']);
            $id_course = $o['id_course'];

            $urlCourse = URL::createLink('default', 'course', 'index', array('id_course' => $id_course, 'id_category' => $id_category), "$name_category/$name_course-$id_category-$id_course.html");
            $xhtmlCourse .= '<li><a href="' . $urlCourse . '">' . $o['name_course'] . '</a></li>';;
        } elseif ($key == DB_TBAUTHOR)
            $xhtmlCourse .= '<li><a href="#">' . $o['name'] . '</a></li>';
        else {
            $text = "tim-kiem-tag";
            $valueTag = $o['name'];
            $urlTag = URL::createLink('default', 'index', 'findTag', ['tag' => $o['name']], "$text-$valueTag.html");
            $xhtmlCourse .= '<li><a href="' . $urlTag . '">' . $o['name'] . '</a></li>';
        }

    }
    $xhtmlCourse .= '</ul>';
    $xhtmlCourse .= '</li>';
}
?>

<header id="header" class="header">
    <div class="container">

        <!-- LOGO -->
        <div class="logo">
            <a href="<?php echo $url['home'] ?>">
                <img src="<?php echo $urlImage ?>/logo.png" alt="" style="height: 100px">
            </a>
        </div>
        <!-- END / LOGO -->

        <!-- NAVIGATION -->
        <nav class="navigation">

            <div class="open-menu">
                <span class="item item-1"></span>
                <span class="item item-2"></span>
                <span class="item item-3"></span>
            </div>

            <!-- MENU -->
            <ul class="menu">
                <li class="current-menu-item"><a href="<?php echo $url['home'] ?>">Home</a></li>
                <li class="menu-item-has-children megamenu col-4">
                    <a href="#">Course</a>
                    <ul class="sub-menu">
                        <?php echo $xhtmlCourse ?>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="https://zendvn.com/" target="_blank">ZendVN</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Login</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo $url['login'] ?>">Login</a></li>
                        <li><a href="register.html">Register</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">About</a>
                </li>
            </ul>
            <!-- END / MENU -->

        </nav>
        <!-- END / NAVIGATION -->

    </div>
</header>


