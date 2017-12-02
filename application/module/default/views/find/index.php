<?php
$resultFind = $this->resultFind['list'];
?>

<!-- SUB BANNER -->
<section class="sub-banner sub-banner-search">
    <div class="awe-parallax bg-section1-demo"></div>
    <div class="awe-overlay overlay-color-1"></div>
    <div class="container">
        <div class="sub-banner-content-result">
            <h2>
                <?php echo count($resultFind) ?> Resultst found for
                <a href="#">
                    <?php echo $this->resultFind['search'] ?>
                </a>
                in  <?php echo $this->resultFind['category'] ?>
            </h2>
        </div>
    </div>
</section>
<!-- END / SUB BANNER -->

<!-- PAGE CONTROL -->
<section class="page-control">
    <div class="container">
        <div class="page-info">
            <a href="index.html"><i class="icon md-arrow-left"></i>Back to home</a>
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
        <div class="content grid">
            <div class="row">
                <!-- ITEM -->
                <?php
                foreach ($resultFind as $find) {

                    ?>
                    <div class="col-xs-6 col-sm-4 col-md-3">
                        <!-- MC ITEM -->

                        <div class="mc-item mc-item-2">
                            <div class="image-heading">
                                <img src="<?php echo $urlImage ?>/feature/img-1.jpg" alt="">
                            </div>
                            <div class="meta-categories"><a href="#">Web design</a></div>
                            <div class="content-item">
                                <div class="image-author">
                                    <img src="<?php echo $urlImage ?>/avatar-1.jpg" alt="">
                                </div>
                                <h4>
                                    <a href="<?php echo URL::createLink('default', DB_TBCOURSE, 'index', ['id' => $find['id']]) ?>">
                                        <?php echo $find['name_course'] ?>
                                    </a>
                                </h4>
                                <div class="name-author">
                                    By <a href="#"><?php echo $find['name_author'] ?></a>
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
                                    <!--                            <span class="price-old">$134</span>-->
                                </div>
                            </div>
                        </div>
                        <!-- END / MC ITEM -->
                    </div>
                <?php } ?>
                <!-- END / ITEM -->


            </div>
        </div>
    </div>
</section>
<!-- END / CATEGORIES CONTENT -->
