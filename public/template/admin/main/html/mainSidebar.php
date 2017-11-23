<?php
$url = array(
    'profile' => URL::createLink('admin', 'user', 'profile'),
    'category' => URL::createLink('admin', 'category', 'index'),
    'course' => array(
        'list' => URL::createLink('admin', 'course', 'index'),
        'add' => URL::createLink('admin', 'course', 'add'),
    )
);

?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $dirAdminLTE ?>/dist/img/user2-160x160.jpg" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
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
                    <span class="glyphicon glyphicon-folder-open"></span>
                    <span>Category</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <span class="glyphicon glyphicon-folder-open"></span>
                    <span>Course</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo $url['course']['list'] ?>">
                            <i class="fa fa-circle-o"></i>
                            <span>Danh sách</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $url['course']['add'] ?>">
                            <i class="fa fa-circle-o"></i>
                            <span>Thêm Course</span>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
