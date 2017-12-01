<?php
$url = array(
    'profile' => URL::createLink('admin', 'user', 'profile'),
    'category' => URL::createLink('admin', 'category', 'index'),
    'course' => URL::createLink('admin', 'course', 'index'),
    'video' => URL::createLink('admin', 'video', 'index'),
    'author' => URL::createLink('admin', 'author', 'index'),
);
$model = new Model();
$query = "SELECT `id`,`name` FROM `" . DB_TBCOURSE . "`";
$listCourse = $model->execute($query, 1);
$userInfo = Session::get("user")['info'];
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $dirImg ?>/no-avatar.png">
            </div>
            <div class="pull-left info">
                <p><?php echo $userInfo['username'] ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?php echo $url['profile'] ?>">
                    <i class="fa fa-fw fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $url['category'] ?>">
                    <i class="fa fa-fw fa-reorder"></i>
                    <span>Category</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $url['course'] ?>">
                    <i class="fa fa-fw fa-file-o"></i>
                    <span>Course</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-youtube-play"></i>
                    <span>Video</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <?php foreach ($listCourse as $val) {
                        $link = URL::createLink('admin', 'video', 'index', ['id' => $val['id']]);
                        ?>
                        <li>
                            <a href='<?php echo $link ?>'>
                                <i class='fa fa-circle-o'></i><?php echo $val['name'] ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
            <li>
                <a href="<?php echo $url['author'] ?>">
                    <i class="fa fa-fw fa-user-secret"></i>
                    <span>Author</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
