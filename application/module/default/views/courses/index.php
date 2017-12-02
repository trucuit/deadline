
<!-- COURSE -->
<section class="course-top">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="sidebar-course-intro">
                    <!-- CURRENT PROGRESS -->
                    <div class="current-progress">
                        <h4 class="sm black">Current Progress</h4>
                        <div class="percent">Complete <span class="count">25%</span></div>
                        <div class="progressbar">
                            <div class="progress-run"></div>
                        </div>
                        <ul class="current-outline">
                            <li><span>4</span>section</li>
                            <li><span>1</span>quizzes</li>
                            <li><span>30</span>units</li>
                            <li><span>5</span>assignments</li>
                        </ul>
                    </div>
                    <!-- END / CURRENT PROGRESS -->

                    <div class="video-course-intro">
                        <div class="video embed-responsive embed-responsive-16by9">
                            <iframe src="https://www.youtube.com/embed/<?php echo $this->video[0]['link']?>" frameborder="0" allowfullscreen class="embed-responsive-item">
                            </iframe>
                        </div>
                    </div>
<!--                    <div class="new-course">-->
<!--                        <div class="item course-code">-->
<!--                            <i class="icon md-barcode"></i>-->
<!--                            <h4><a href="#">Course Code</a></h4>-->
<!--                            <p class="detail-course"># A 15273</p>-->
<!--                        </div>-->
<!--                        <div class="item course-code">-->
<!--                            <i class="icon md-time"></i>-->
<!--                            <h4><a href="#">Duration</a></h4>-->
<!--                            <p class="detail-course">3 weeks</p>-->
<!--                        </div>-->
<!--                        <div class="item course-code">-->
<!--                            <i class="icon md-img-check"></i>-->
<!--                            <h4><a href="#">Open Date</a></h4>-->
<!--                            <p class="detail-course">25 May 2014</p>-->
<!--                        </div>-->
<!--                    </div>-->
                    <hr class="line">
                    <div class="about-instructor">
                        <h4 class="xsm black bold">About Instructor</h4>
                        <ul>
                            <li>
                                <div class="image-instructor text-center">
                                    <img src="<?php echo $urlImage?>/team-13.jpg" alt="">
                                </div>
                                <div class="info-instructor">
                                    <cite class="sm black"><a href="#"><?php echo $this->video[0]['name_author']?></a></cite>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-envelope"></i></a>
                                    <a href="#"><i class="fa fa-check-square"></i></a>
                                    <p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero</p>
                                </div>
                            </li>
<!--                            <li>-->
<!--                                <div class="image-instructor">-->
<!--                                    <img src="--><?php //echo $urlImage?><!--/team-13.jpg" alt="">-->
<!--                                </div>-->
<!--                                <div class="info-instructor">-->
<!--                                    <cite class="sm black"><a href="#">John Doe</a></cite>-->
<!--                                    <a href="#"><i class="fa fa-envelope"></i></a>-->
<!--                                    <a href="#"><i class="icon md-user-plus"></i></a>-->
<!--                                    <p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero</p>-->
<!--                                </div>-->
<!--                            </li>-->
                        </ul>
                    </div>
                    <hr class="line">
<!--                    <div class="widget widget_equipment">-->
<!--                        <i class="icon md-config"></i>-->
<!--                        <h4 class="xsm black bold">Equipment</h4>-->
<!--                        <div class="equipment-body">-->
<!--                            <a href="#">Photoshop CC</a>,-->
<!--                            <a href="#">Illustrator CC</a>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="widget widget_tags">
                        <i class="icon md-download-2"></i>
                        <h4 class="xsm black bold">Tag</h4>
                        <div class="tagCould">
                            <a href="#">Design</a>,
                            <a href="#">Photoshop</a>,
                            <a href="#">Illustrator</a>,
                            <a href="">Art</a>,
                            <a href="">Graphic Design</a>
                        </div>
                    </div>
                    <div class="widget widget_share">
                        <i class="icon md-forward"></i>
                        <h4 class="xsm black bold">Share course</h4>
                        <div class="share-body">
                            <a href="#" class="twitter" title="twitter">
                                <i class="icon md-twitter"></i>
                            </a>
                            <a href="#" class="pinterest" title="pinterest">
                                <i class="icon md-pinterest-1"></i>
                            </a>
                            <a href="#" class="facebook" title="facebook">
                                <i class="icon md-facebook-1"></i>
                            </a>
                            <a href="#" class="google-plus" title="google plus">
                                <i class="icon md-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="tabs-page">
                    <ul class="nav-tabs" role="tablist">
                        <li class="active"><a href="#outline" role="tab" data-toggle="tab">Outline</a></li>
                        <li class="itemnew"><a href="#announcement" role="tab" data-toggle="tab">Announcement</a></li>
                        <li class="itemnew"><a href="#discussion" role="tab" data-toggle="tab">Discussion</a></li>
                        <li><a href="#review" role="tab" data-toggle="tab">Review</a></li>
                        <li><a href="#student" role="tab" data-toggle="tab">Student</a></li>
                        <li><a href="#updatelog" role="tab" data-toggle="tab">Update Log</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">

                        <!-- OUTLINE -->
                        <div class="tab-pane fade in active" id="outline">

                            <!-- SECTION OUTLINE -->
                            <div class="section-outline">
<!--                                <h4 class="tit-section xsm">Section 1: Introduction</h4>-->
                                <?php
                                $number=1;
                                foreach ($this->video as $infoVideo){

                                ?>
                                <ul class="section-list">
                                    <li class="o-view">
                                        <div class="count"><span><?php echo $number  ?></span></div>
                                        <div class="list-body">
                                            <i class="icon md-camera"></i>
                                            <p><a href="#" class="name-video" link="<?php echo $infoVideo['link']?>"><?php echo $infoVideo['title']?></a>
                                            </p>
<!--                                            <div class="data-lessons">-->
<!--                                                <span>36:56</span>-->
<!--                                            </div>-->

                                            <div class="download">
                                                <div class="download-ct">
                                                    <span>Reference 12 mb</span>
                                                </div>
                                            </div>
                                            <div class="div-x"><i class="icon md-check-2"></i></div>
                                            <div class="line"></div>
                                        </div>
                                    </li>
                                    <?php
                                    $number++;
                                    }
                                    ?>

                                </ul>
                            </div>
                            <!-- END / SECTION OUTLINE -->


                            <!-- END / SECTION OUTLINE -->
                        </div>
                        <!-- END / OUTLINE -->

                        <!-- ANNOUNCEMENT -->
                        <div class="tab-pane fade" id="announcement">
                            <ul class="list-announcement">

                                <!-- LIST ITEM -->
                                <li>
                                    <div class="list-body">
                                        <i class="icon md-flag"></i>
                                        <div class="list-content">
                                            <h4 class="sm black bold">
                                                <a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                            </h4>
                                            <p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>
                                            <div class="author">By <a href="#">Name of Mr or Mrs</a></div>
                                            <em>5 days ago</em>
                                        </div>
                                    </div>
                                </li>
                                <!-- END / LIST ITEM -->

                                <!-- LIST ITEM -->
                                <li>
                                    <div class="list-body">
                                        <i class="icon md-flag"></i>
                                        <div class="list-content">
                                            <h4 class="sm black bold">
                                                <a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                            </h4>
                                            <div class="video embed-responsive embed-responsive-16by9">
                                                <iframe src="//player.vimeo.com/video/90884823" class="embed-responsive-item">
                                                </iframe>
                                            </div>
                                            <p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>
                                            <div class="author">By <a href="#">Name of Mr or Mrs</a></div>
                                            <em>5 days ago</em>
                                        </div>
                                    </div>
                                </li>
                                <!-- END / LIST ITEM -->

                                <!-- LIST ITEM -->
                                <li>
                                    <div class="list-body">
                                        <i class="icon md-flag"></i>
                                        <div class="list-content">
                                            <h4 class="sm black bold">
                                                <a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                            </h4>
                                            <p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>
                                            <div class="author">By <a href="#">Name of Mr or Mrs</a></div>
                                            <em>5 days ago</em>
                                        </div>
                                    </div>
                                </li>
                                <!-- END / LIST ITEM -->
                            </ul>
                        </div>
                        <!-- END / ANNOUNCEMENT -->

                        <!-- DISCUSSION -->
                        <div class="tab-pane fade" id="discussion">
                            <h3 class="md black">5 Topics</h3>
                            <div class="form-discussion">
                                <form>
                                    <div class="text-title">
                                        <input type="text" placeholder="Topic title here">
                                    </div>
                                    <div class="post-editor text-form-editor">
                                        <img src="<?php echo $urlImage?>/editor-demo-1.jpg" alt="">
                                        <textarea placeholder="Discussion content"></textarea>
                                    </div>
                                    <div class="form-submit">
                                        <input type="submit" value="Post" class="mc-btn-2 btn-style-2">
                                    </div>
                                </form>
                            </div>

                            <ul class="list-discussion">

                                <!-- LIST ITEM -->
                                <li>
                                    <div class="list-body">
                                        <div class="image">
                                            <img src="<?php echo $urlImage?>/team-13.jpg" alt="">
                                        </div>
                                        <div class="list-content">
                                            <cite class="xsm black bold"><a href="#">Neo Khuat  Dai Gia</a></cite>
                                            <h4 class="md black">Title of topic shown only. When user click on topic it show full content and discussion below</h4>
                                            <div class="comment-meta">
                                                <a href="#">5 days ago</a>
                                                <a href="#"><i class="icon md-arrow-up"></i>13</a>
                                                <a href="#"><i class="icon md-arrow-down"></i>25</a>
                                                <a href=""><i class="icon md-back"></i>384 replies</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- END / LIST ITEM -->

                                <!-- LIST ITEM -->
                                <li>
                                    <div class="list-body">
                                        <div class="image">
                                            <img src="<?php echo $urlImage?>/team-13.jpg" alt="">
                                        </div>
                                        <div class="list-content">
                                            <cite class="xsm black bold"><a href="#">Neo Khuat  Dai Gia</a></cite>
                                            <h4 class="md black">Title of topic shown only. When user click on topic it show full content and discussion below</h4>
                                            <div class="comment-meta">
                                                <a href="#">5 days ago</a>
                                                <a href="#"><i class="icon md-arrow-up"></i>13</a>
                                                <a href="#"><i class="icon md-arrow-down"></i>25</a>
                                                <a href=""><i class="icon md-back"></i>384 replies</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- END / LIST ITEM -->

                                <!-- LIST ITEM -->
                                <li>
                                    <div class="list-body">
                                        <div class="image">
                                            <img src="<?php echo $urlImage?>/team-13.jpg" alt="">
                                        </div>
                                        <div class="list-content">
                                            <cite class="xsm black bold"><a href="#">Neo Khuat  Dai Gia</a></cite>
                                            <h4 class="md black">Title of topic shown only. When user click on topic it show full content and discussion below</h4>
                                            <div class="comment-meta">
                                                <a href="#">5 days ago</a>
                                                <a href="#"><i class="icon md-arrow-up"></i>13</a>
                                                <a href="#"><i class="icon md-arrow-down"></i>25</a>
                                                <a href=""><i class="icon md-back"></i>384 replies</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- END / LIST ITEM -->
                            </ul>

                            <div class="load-more">
                                <a href="">
                                    <i class="icon md-time"></i>
                                    Load more previous update</a>
                            </div>
                        </div>
                        <!-- END / DISCUSSION -->

                        <!-- REVIEW -->
                        <div class="tab-pane fade" id="review">
                            <div class="total-review">
                                <h3 class="md black">4 Reviews</h3>
                                <div class="rating">
                                    <a href="#" class="active"></a>
                                    <a href="#" class="active"></a>
                                    <a href="#" class="active"></a>
                                    <a href="#"></a>
                                    <a href="#"></a>
                                </div>
                            </div>
                            <div class="form-review">
                                <form>
                                    <div class="review-editor text-form-editor">
                                        <img src="<?php echo $urlImage?>/editor-demo-1.jpg" alt="">
                                        <textarea placeholder="Discussion content"></textarea>
                                    </div>
                                    <div class="form-submit">
                                        <input type="submit" value="Post" class="mc-btn-2 btn-style-2">
                                    </div>
                                </form>
                                <div class="your-rate">
                                    <span>Your rate</span>
                                    <div class="rating">
                                        <a href="#" class="active"></a>
                                        <a href="#" class="active"></a>
                                        <a href="#" class="active"></a>
                                        <a href="#"></a>
                                        <a href="#"></a>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-review">
                                <li class="review">
                                    <div class="body-review">
                                        <div class="review-author">
                                            <a href="#">
                                                <img src="<?php echo $urlImage?>/team-13.jpg" alt="">
                                                <i class="icon md-email"></i>
                                                <i class="icon md-user-plus"></i>
                                            </a>
                                            <i class="icon"></i>
                                            <i class="icon"></i>
                                        </div>
                                        <div class="content-review">
                                            <h4 class="sm black">
                                                <a href="#">John Doe</a>
                                            </h4>
                                            <div class="rating">
                                                <a href="#" class="active"></a>
                                                <a href="#" class="active"></a>
                                                <a href="#" class="active"></a>
                                                <a href="#"></a>
                                                <a href="#"></a>
                                            </div>
                                            <em>5 days ago</em>
                                            <p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="review">
                                    <div class="body-review">
                                        <div class="review-author">
                                            <a href="#">
                                                <img src="<?php echo $urlImage?>/team-13.jpg" alt="">
                                                <i class="icon md-email"></i>
                                                <i class="icon md-user-plus"></i>
                                            </a>
                                            <i class="icon"></i>
                                            <i class="icon"></i>
                                        </div>
                                        <div class="content-review">
                                            <h4 class="sm black">
                                                <a href="#">John Doe</a>
                                            </h4>
                                            <div class="rating">
                                                <a href="#" class="active"></a>
                                                <a href="#" class="active"></a>
                                                <a href="#" class="active"></a>
                                                <a href="#"></a>
                                                <a href="#"></a>
                                            </div>
                                            <em>5 days ago</em>
                                            <p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="review">
                                    <div class="body-review">
                                        <div class="review-author">
                                            <a href="#">
                                                <img src="<?php echo $urlImage?>/team-13.jpg" alt="">
                                                <i class="icon md-email"></i>
                                                <i class="icon md-user-plus"></i>
                                            </a>
                                            <i class="icon"></i>
                                            <i class="icon"></i>
                                        </div>
                                        <div class="content-review">
                                            <h4 class="sm black">
                                                <a href="#">John Doe</a>
                                            </h4>
                                            <div class="rating">
                                                <a href="#" class="active"></a>
                                                <a href="#" class="active"></a>
                                                <a href="#" class="active"></a>
                                                <a href="#"></a>
                                                <a href="#"></a>
                                            </div>
                                            <em>5 days ago</em>
                                            <p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="review">
                                    <div class="body-review">
                                        <div class="review-author">
                                            <a href="#">
                                                <img src="<?php echo $urlImage?>/team-13.jpg" alt="">
                                                <i class="icon md-email"></i>
                                                <i class="icon md-user-plus"></i>
                                            </a>
                                            <i class="icon"></i>
                                            <i class="icon"></i>
                                        </div>
                                        <div class="content-review">
                                            <h4 class="sm black">
                                                <a href="#">John Doe</a>
                                            </h4>
                                            <div class="rating">
                                                <a href="#" class="active"></a>
                                                <a href="#" class="active"></a>
                                                <a href="#" class="active"></a>
                                                <a href="#"></a>
                                                <a href="#"></a>
                                            </div>
                                            <em>5 days ago</em>
                                            <p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="load-more">
                                <a href="">
                                    <i class="icon md-time"></i>
                                    Load more previous update</a>
                            </div>
                        </div>
                        <!-- END / REVIEW -->

                        <!-- STUDENT -->
                        <div class="tab-pane fade" id="student">
                            <h3 class="md black">53618 Students applied</h3>
                            <div class="tab-list-student">
                                <ul class="list-student">
                                    <!-- LIST STUDENT -->
                                    <li>
                                        <div class="image">
                                            <img src="<?php echo $urlImage?>/team-13.jpg" alt="">
                                        </div>
                                        <div class="list-body">
                                            <cite class="xsm"><a href="#">Neo Khuat</a></cite>
                                            <span class="address">Hanoi, Vietnam</span>
                                            <div class="icon-wrap">
                                                <a href="#"><i class="icon md-email"></i></a>
                                                <a href="#"><i class="icon md-user-plus"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END / LIST STUDENT -->

                                    <!-- LIST STUDENT -->
                                    <li>
                                        <div class="image">
                                            <img src="<?php echo $urlImage?>/team-13.jpg" alt="">
                                        </div>
                                        <div class="list-body">
                                            <cite class="xsm"><a href="#">Neo Khuat</a></cite>
                                            <span class="address">Hanoi, Vietnam</span>
                                            <div class="icon-wrap">
                                                <a href="#"><i class="icon md-email"></i></a>
                                                <a href="#"><i class="icon md-user-plus"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END / LIST STUDENT -->

                                    <!-- LIST STUDENT -->
                                    <li>
                                        <div class="image">
                                            <img src="<?php echo $urlImage?>/team-13.jpg" alt="">
                                        </div>
                                        <div class="list-body">
                                            <cite class="xsm"><a href="#">Neo Khuat</a></cite>
                                            <span class="address">Hanoi, Vietnam</span>
                                            <div class="icon-wrap">
                                                <a href="#"><i class="icon md-email"></i></a>
                                                <a href="#"><i class="icon md-user-plus"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END / LIST STUDENT -->

                                    <!-- LIST STUDENT -->
                                    <li>
                                        <div class="image">
                                            <img src="<?php echo $urlImage?>/team-13.jpg" alt="">
                                        </div>
                                        <div class="list-body">
                                            <cite class="xsm"><a href="#">Neo Khuat</a></cite>
                                            <span class="address">Hanoi, Vietnam</span>
                                            <div class="icon-wrap">
                                                <a href="#"><i class="icon md-email"></i></a>
                                                <a href="#"><i class="icon md-user-plus"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END / LIST STUDENT -->

                                    <!-- LIST STUDENT -->
                                    <li>
                                        <div class="image">
                                            <img src="<?php echo $urlImage?>/team-13.jpg" alt="">
                                        </div>
                                        <div class="list-body">
                                            <cite class="xsm"><a href="#">Neo Khuat</a></cite>
                                            <span class="address">Hanoi, Vietnam</span>
                                            <div class="icon-wrap">
                                                <a href="#"><i class="icon md-email"></i></a>
                                                <a href="#"><i class="icon md-user-plus"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END / LIST STUDENT -->

                                    <!-- LIST STUDENT -->
                                    <li>
                                        <div class="image">
                                            <img src="<?php echo $urlImage?>/team-13.jpg" alt="">
                                        </div>
                                        <div class="list-body">
                                            <cite class="xsm"><a href="#">Neo Khuat</a></cite>
                                            <span class="address">Hanoi, Vietnam</span>
                                            <div class="icon-wrap">
                                                <a href="#"><i class="icon md-email"></i></a>
                                                <a href="#"><i class="icon md-user-plus"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END / LIST STUDENT -->

                                </ul>
                            </div>
                            <div class="load-more">
                                <a href="">
                                    <i class="icon md-time"></i>
                                    Load more previous update</a>
                            </div>
                        </div>
                        <!-- END / STUDENT -->

                        <!-- UPDATE LOG -->
                        <div class="tab-pane fade" id="updatelog">
                            <ul class="list-update">
                                <li>
                                    <div class="time-update">
                                        <span>5 days ago</span>
                                    </div>
                                    <div class="content-update">
                                        <p>
                                            <a href="#">Morbi nec nisi ante. </a>
                                            Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="time-update">
                                        <span>5, May 2014</span>
                                    </div>
                                    <div class="content-update">
                                        <p>
                                            <a href="#">Morbi nec nisi ante. </a>
                                            Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="time-update">
                                        <span>5, May 2014</span>
                                    </div>
                                    <div class="content-update">
                                        <p>
                                            <a href="#">Morbi nec nisi ante. </a>
                                            Quisque lacus ligula,
                                            <a href="#">iaculis in elit et</a>
                                        </p>
                                        <ul class="list-content-update">
                                            <li>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, </li>
                                            <li>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, </li>
                                            <li>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="time-update">
                                        <span>5, May 2014</span>
                                    </div>
                                    <div class="content-update">
                                        <p>
                                            <a href="#">Morbi nec nisi ante. </a>
                                            Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="time-update">
                                        <span>5, May 2014</span>
                                    </div>
                                    <div class="content-update">
                                        <p>
                                            <a href="#">Morbi nec nisi ante. </a>
                                            Quisque lacus ligula,
                                            <a href="#">iaculis in elit et</a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <div class="load-more">
                                <a href="">
                                    <i class="icon md-time"></i>
                                    Load more previous update</a>
                            </div>
                        </div>
                        <!-- END / UPDATE LOG -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / COURSE TOP -->

<!-- COURSE CONCERN -->
<section id="course-concern" class="course-concern">
    <div class="container">
        <h3 class="md black">Courses you may concern</h3>
        <div class="row">
            <?php foreach ($this->category as $valueCategory) {

                ?>
                <div class="col-sm-6 col-md-3 course-relative">
                    <!-- MC ITEM -->
                    <div class="mc-item mc-item-2">
                        <div class="image-heading">
                            <img src="<?php echo $urlImage?>/feature/img-1.jpg" alt="">
                        </div>
                        <div class="meta-categories"><a href="#">Web design</a></div>
                        <div class="content-item">
                            <div class="image-author">
                                <img src="<?php echo $urlImage?>/avatar-1.jpg" alt="">
                            </div>
                            <h4 class="name-course">
                                <a  href="<?php echo URL::createLink('default', 'courses', 'index', ['id' => $valueCategory['course_id']]) ?>"><?php echo $valueCategory['name_course'] ?></a>
                            </h4>
                            <div class="name-author">
                                By <a href="#"><?php echo $valueCategory['name_author']?></a>
                            </div>
                        </div>
                        <div class="ft-item item-rate">
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
                    <!-- END / MC ITEM -->
                </div>
                <?php

            }
            ?>

        </div>
    </div>
</section>
<!-- END / COURSE CONCERN -->