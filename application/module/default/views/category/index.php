<?php
$listCourse = $this->listCourse;
$listCategory = $this->listCategory;
$url = [
        'home' => URL::createLink("default",'index','index')
]
?>
<!-- SUB BANNER -->
<section class="sub-banner section">
    <div class="awe-parallax bg-profile-feature"></div>
    <div class="awe-overlay overlay-color-3"></div>
    <div class="container">
        <div class="sub-banner-content">
            <h2 class="big">This is banner for promoted course</h2>
            <p>this is not only an elegant theme but also a course management system for wordpress and drupal</p>
            <a href="#" class="mc-btn btn-style-3">See course</a>
        </div>
    </div>
</section>
<!-- END / SUB BANNER -->


<!-- PAGE CONTROL -->
<section class="page-control">
    <div class="container">
        <div class="page-info">
            <a href="<?php echo $url['home'] ?>?>"><i class="icon md-arrow-left"></i>Back to home</a>
        </div>
        <div class="page-view">
            View
            <span class="page-view-info view-grid active" title="View grid"><i class="icon md-ico-2"></i></span>
            <span class="page-view-info view-list" title="View list"><i class="icon md-ico-1"></i></span>
        </div>
    </div>
</section>
<!-- END / PAGE CONTROL -->

<!-- CATEGORIES CONTENT -->
<section id="categories-content" class="categories-content">
    <div class="container">
        <div class="row">

            <div class="col-md-9 col-md-push-3">
                <div class="content grid">
                    <div class="row">
                        <?php foreach ($listCourse as $value) {
                            $name_category = URL::filterURL($value['name_category']);
                            $id_category = $value['id_category'];
                            $name_course = URL::filterURL($value['name_course']);
                            $id_course = $value['id_course'];
                            $url = URL::createLink('default', 'course', 'index', array('id_course' => $id_course, 'id_category' => $id_category), "$name_category/$name_course-$id_category-$id_course.html")
                            ?>
                            <!-- ITEM -->
                            <div class="col-sm-6 col-md-4">
                                <div class="mc-item mc-item-2">
                                    <div class="image-heading">
                                        <img src="<?php echo $urlImage ?>/feature/img-1.jpg" alt="">
                                    </div>
                                    <div class="meta-categories">
                                        <a href="#">Web design</a>
                                    </div>
                                    <div class="content-item">
                                        <div class="image-author">
                                            <img src="<?php echo $urlImage ?>/avatar-1.jpg" alt="">
                                        </div>
                                        <h4>
                                            <a href="<?php echo $url ?>"
                                               class="nameCategory">
                                                <?php echo $value['name_course'] ?></a>
                                        </h4>
                                        <div class="name-author">
                                            By <a href="#"><?php echo $value['name_author'] ?></a>
                                        </div>
                                    </div>
                                    <div class="ft-item">
                                        <div class="rating">
                                            <a href="#" class="active"></a>
                                            <a href="#" class="active"></a>
                                            <a href="#" class="active"></a>
                                            <a href="#"></a>
                                            <a href="#"></a>
                                        </div>
                                        <div class="view-info">
                                            <i class="icon md-users"></i>
                                            2568
                                        </div>
                                        <div class="comment-info">
                                            <i class="icon md-comment"></i>
                                            25
                                        </div>
                                        <div class="price">
                                            Free
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END / ITEM -->
                        <?php } ?>

                    </div>
                </div>
            </div>

            <!-- SIDEBAR CATEGORIES -->
            <div class="col-md-3 col-md-pull-9">
                <aside class="sidebar-categories">
                    <div class="inner">

                        <!-- WIDGET CATEGORIES -->
                        <div class="widget widget_categories">
                            <ul class="list-style-block">
                                <?php foreach ($listCategory as $value) {
                                    $categoryURL = URL::filterURL($value['name']);
                                    $id_category =$value['id'];
                                    $urlCategory = URL::createLink('default', 'category', 'showCourse', ['id' => $id_category], "$categoryURL-$id_category.html");
                                    ?>
                                    <li class="category-<?php echo $value['id'] ?>">
                                        <a href="<?php echo $urlCategory ?>">
                                            <?php echo $value['name'] ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- END / WIDGET CATEGORIES -->

                        <!-- BANNER ADS -->
                        <div class="mc-banner">
                            <a href="#"><img src="<?php echo $urlImage ?>/banner-ads-1.jpg" alt=""></a>
                        </div>
                        <!-- END / BANNER ADS -->

                        <!-- BANNER ADS -->
                        <div class="mc-banner">
                            <a href="#"><img src="<?php echo $urlImage ?>/banner-ads-2.jpg" alt=""></a>
                        </div>
                        <!-- END / BANNER ADS -->
                    </div>
                </aside>
            </div>
            <!-- END / SIDEBAR CATEGORIES -->

        </div>
    </div>
</section>
<!-- END / CATEGORIES CONTENT -->
