<!-- SECTION 1 -->
<section id="mc-section-1" class="mc-section-1 section">
    <div class="container">
        <div class="row">

            <div class="col-md-5">
                <div class="mc-section-1-content-1">
                    <h2 class="big">Online And Offline Training Course Management</h2>
                    <p class="mc-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                        euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                    <a href="#" class="mc-btn btn-style-1">About us</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-offset-1">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="featured-item">
                            <i class="icon icon-featured-1"></i>
                            <h4 class="title-box text-uppercase">CLEAN AND EASY</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam tincidunt ut
                                laoreet</p>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="featured-item">
                            <i class="icon icon-featured-2"></i>
                            <h4 class="title-box text-uppercase">TEACH AS YOU CAN</h4>
                            <p> Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit</p>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="featured-item">
                            <i class="icon icon-featured-3"></i>
                            <h4 class="title-box text-uppercase">COMMUNITY SUPPORT</h4>
                            <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                consequat</p>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="featured-item">
                            <i class="icon icon-featured-4"></i>
                            <h4 class="title-box text-uppercase">TRACKING PERFORMANCE</h4>
                            <p> Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- END / SECTION 1 -->


<!-- SECTION 2 -->
<section id="mc-section-2" class="mc-section-2 section">
    <div class="awe-parallax bg-section1-demo"></div>
    <div class="overlay-color-1"></div>
    <div class="container">
        <div class="section-2-content">
            <div class="row">

                <div class="col-md-5">
                    <div class="ct">
                        <h2 class="big">Learning online is easier than ever before</h2>
                        <p class="mc-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                            nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                        <a href="#" class="mc-btn btn-style-3">See how it work</a>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="image">
                        <img src="<?php echo $urlImage ?>/image.png" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- END / SECTION 2 -->


<!-- SECTION 3 -->
<section id="mc-section-3" class="mc-section-3 section">
    <div class="container">
        <!-- FEATURE -->
        <?php
        foreach ($this->category as $key => $valueCategory) {

            ?>
            <div class="feature-course">
                <h4 class="title-box text-uppercase"><?php echo $key ?></h4>
                <a href="categories.html" class="all-course mc-btn btn-style-1">View all</a>
                <div class="row">
                    <div class="feature-slider">
                        <?php
                        foreach ($valueCategory as $value) {
                            ?>
                            <div class="mc-item mc-item-1">
                                <div class="image-heading">
                                    <img src="<?php echo $urlImage ?>/feature/img-1.jpg" alt="">
                                </div>
                                <div class="meta-categories"><a href="#">Web design</a></div>
                                <div class="content-item">
                                    <div class="image-author">
                                        <img src="<?php echo $urlImage ?>/avatar-1.jpg" alt="">
                                    </div>
                                    <h4>
                                        <a href="<?php echo URL::createLink('default', 'courses', 'index', ['id' => $value['id_course']]) ?>"
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
                                        <!--                                <span class="price-old">$134</span>-->
                                    </div>
                                </div>
                            </div>
                            <?php

                        }
                        ?>

                    </div>

                </div>
            </div>
            <?php


        }
        ?>
        <!-- END / FEATURE -->
    </div>
</section>
<!-- END / SECTION 3 -->