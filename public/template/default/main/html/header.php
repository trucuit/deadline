<?php
$url = [
    'login' => URL::createLink('admin', 'index', 'login')
];
$arrCourseHeader = $this->arrCourseHeader;

$xhtmlCourse = "";
foreach ($arrCourseHeader as $key => $val) {
    $xhtmlCourse .= '<li class="menu-item-has-children">';
    if ($key == DB_TBCATEGORY || $key == DB_TBCOURSE)
        $xhtmlCourse .= '<a href="#">' . "Top&nbsp;". ucfirst($key) . '</a>';
    else
        $xhtmlCourse .= '<a href="#">' . ucfirst($key) . '</a>';
    $xhtmlCourse .= '<ul class="sub-menu">';
    foreach ($val as $o) {
        if ($key == DB_TBCATEGORY)
            $xhtmlCourse .= '<li><a href="#' . DB_TBCATEGORY . '-' . $o['id'] . '">' . $o['name'] . '</a></li>';
        elseif ($key == DB_TBCOURSE)
            $xhtmlCourse .= '<li><a href="' . URL::createLink("default", DB_TBCOURSE, "index", ["id" => $o['id']]) . '">' . $o['name'] . '</a></li>';
        else
            $xhtmlCourse .= '<li><a href="#">' . $o['name'] . '</a></li>';

    }
    $xhtmlCourse .= '</ul>';
    $xhtmlCourse .= '</li>';
}
?>

<header id="header" class="header">
    <div class="container">

        <!-- LOGO -->
        <div class="logo">
            <a href="index.html">
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
                <li class="current-menu-item"><a href="index.html">Home</a></li>
                <li class="menu-item-has-children megamenu col-4">
                    <a href="#">Course</a>
                    <ul class="sub-menu">
                        <?php echo $xhtmlCourse ?>
                        <li class="menu-item-has-children">
                            <a href="#">Tag</a>
                            <ul class="sub-menu">
                                <li><a href="#">Tag 1</a></li>
                                <li><a href="#">Tag 2</a></li>
                                <li><a href="#">Tag 3</a></li>
                                <li><a href="#">Tag 4</a></li>
                                <li><a href="#">Tag 5</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="https://zendvn.com/" target="_blank">ZendVN</a>
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


