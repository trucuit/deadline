<?php
$listVideo = $this->video;
$listVideoRelativeQuery = $this->listVideoRelativeQuery;
$infoCourse = $this->course;
$url = $_SERVER['REQUEST_URI'];
?>
<!-- COURSE -->
<section class="course-top">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="sidebar-course-intro">
                    <!-- CURRENT PROGRESS -->
                    <div class="current-progress">
                        <h4 class="sm black">Quá trình</h4>
                        <?php
                        $cookie = Cookie::get('view');
                        $countProcess = 0;
                        foreach ($cookie as $value) {
                            foreach ($this->video as $valueVideo) {
                                if ($value == "video-" . $valueVideo['video_id']) {
                                    $countProcess++;
                                }
                            }
                        }
                        $percent = $countProcess / count($this->video) * 100;
                        ?>
                        <div class="percent">Hoàn thành <span class="count"><?php echo round($percent, 0) ?>%</span>
                        </div>
                        <div class="progressbar">
                            <div class="progress-run"></div>
                        </div>
                        <ul class="current-outline">
                            <li><span><?php echo count($this->video) ?></span>Video</li>

                        </ul>
                    </div>
                    <!-- END / CURRENT PROGRESS -->

                    <div class="video-course-intro">
                        <div class="video embed-responsive embed-responsive-16by9">
                            <iframe src="https://www.youtube.com/embed/<?php echo $this->video[0]['link'] ?>"
                                    frameborder="0" allowfullscreen class="embed-responsive-item">
                            </iframe>
                        </div>
                    </div>
                    <div class="about-instructor">
                        <h4 class="xsm black bold">Tác giả</h4>
                        <ul>
                            <li>
                                <div class="image-instructor text-center">
                                    <img src="<?php echo $urlImage ?>/author/<?php echo $this->video[0]['author_avatar'] ?>"
                                         alt="">
                                </div>
                                <div class="info-instructor">
                                    <cite class="sm black"><a href="#"><?php echo $this->video[0]['name_author'] ?></a></cite>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-envelope"></i></a>
                                    <a href="#"><i class="fa fa-check-square"></i></a>
                                    <p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper
                                        quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet
                                        libero</p>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <hr class="line">
                    <div class="widget widget_tags">
                        <i class="icon md-download-2"></i>
                        <h4 class="xsm black bold">Tag</h4>
                        <div class="tagCould">
                            <form action="#" method="post" id="appFormTag">
                                <?php
                                $tag = explode(",", $this->video[0]['tag']);
                                foreach ($tag as $key => $valueTag) {
                                    $text = "tim-kiem-tag";
                                    $urlTag = URL::createLink('default', 'index', 'findTag', ['tag' => $valueTag], "$text-$valueTag.html");
                                    ?>
                                    <a href="<?php echo $urlTag ?>">
                                        <?php
                                        if ($key == count($tag) - 1)
                                            echo ucfirst($valueTag);
                                        else {
                                            echo ucfirst($valueTag) . ", ";
                                        }
                                        ?>
                                    </a>
                                <?php } ?>
                            </form>
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
                            <span class="facebook"
                                  data-href="<?php echo DOMAIN . $url ?>"
                                  data-layout="button" data-size="small" data-mobile-iframe="true">
                                <a class="fb-xfbml-parse-ignore" target="_blank"
                                   href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(DOMAIN . $url) ?>&amp;src=sdkpreparse">
                                    <i class="icon md-facebook-1"></i>
                                </a>
                            </span>
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
                        <li class="active"><a href="#outline" role="tab" data-toggle="tab">Menu Video</a></li>
                        <li><a href="#announcement" role="tab" data-toggle="tab">Sourse Code</a></li>
                        <li class="itemnew"><a href="#discussion" role="tab" data-toggle="tab">Facebook Comment</a></li>
                        <li class="itemnew"><a href="#" role="tab" data-toggle="tab">Youtube Comment</a></li>

                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">

                        <!-- OUTLINE -->
                        <div class="tab-pane fade in active" id="outline">

                            <!-- SECTION OUTLINE -->
                            <div class="section-outline">

                                <ul class="section-list">
                                    <?php
                                    foreach ($listVideo as $key => $infoVideo) {
                                        if (in_array("video-" . $infoVideo['video_id'], Cookie::get('view'))) {
                                            $active = "active";
                                            $check = ' md-check-2';

                                        } else {
                                            $active = "";
                                            $check = '';
                                        }
                                        ?>
                                        <li class="o-view <?php echo $active ?>">
                                            <div class="count active"><span><?php echo $key + 1 ?></span></div>
                                            <div class="list-body">
                                                <i class="icon md-camera"></i>
                                                <p><a href="#" class="name-video"
                                                      id="video-<?php echo $infoVideo['video_id'] ?>"
                                                      link="<?php echo $infoVideo['link'] ?>"><?php echo $infoVideo['title'] ?></a>
                                                </p>
                                                <div class="download">
                                                    <div class="download-ct">
                                                        <span>Reference 12 mb</span>
                                                    </div>
                                                </div>
                                                <div class="div-x"><i class="icon<?php echo $check ?>"></i></div>
                                                <div class="line"></div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!-- END / SECTION OUTLINE -->
                        </div>
                        <!-- END / OUTLINE -->
                        <!-- ANNOUNCEMENT -->
                        <div class="tab-pane fade" id="announcement">
                            <h4 class="sm black bold">Link Github:</h4>
                            <p><?php echo $infoCourse['github'] ?></p>
                        </div>
                        <!-- END / ANNOUNCEMENT -->

                        <!-- DISCUSSION -->
                        <div class="tab-pane fade" id="discussion">
                            <div class="fb-comments"
                                 data-href="<?php echo DOMAIN . $url ?>"
                                 data-width="500" data-numposts="5">

                            </div>
                        </div>
                        <!-- END / DISCUSSION -->
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
        <h3 class="md black">Khóa học liên quan</h3>
        <div class="row">
            <?php foreach ($listVideoRelativeQuery as $value) {
                $name_category = URL::filterURL($value['name_category']);
                $id_category = $value['category_id'];
                $name_course = URL::filterURL($value['name_course']);
                $id_course = $value['course_id'];
                $author_avatar = $value['author_avatar'];
                $urlCourse = URL::createLink('default', 'course', 'index', array('id_course' => $id_course, 'id_category' => $id_category), "$name_category/$name_course-$id_category-$id_course.html");
                ?>
                <div class="col-sm-6 col-md-3 course-relative">
                    <!-- MC ITEM -->
                    <div class="mc-item mc-item-2">
                        <div class="image-heading">
                            <img src="<?php echo $urlImage . "/course/" . $value['course_image'] ?>" alt="">
                        </div>
                        <div class="meta-categories"><a href="#">Web design</a></div>
                        <div class="content-item">
                            <div class="image-author">
                                <img src="<?php echo $urlImage ?>/author/<?php echo $author_avatar ?>" alt="">
                            </div>
                            <h4 class="name-course">
                                <a href="<?php echo $urlCourse ?>"><?php echo $value['name_course'] ?></a>
                            </h4>
                            <div class="name-author">
                                By <a href="#"><?php echo $value['name_author'] ?></a>
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
    </div>
</section>
<!-- END / COURSE CONCERN-->
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11&appId=1937598989836489';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<?php
$session = Session::get('nameMenu')
?>
<script type="text/javascript">

    $(function () {
        var session = '<?php echo $session?>';

        if (session !== '') {
            var activeDefault = $('.tabs-page .nav-tabs li')[0];
            $(activeDefault).removeClass("active");
            $('#outline').removeClass("active");
            $(session).addClass("active in");
            var active = "a[href=" + session + "]";
            $(active).parents('li').addClass("active");

            if ($('.nav-tabs').length) {
                $.each($('.nav-tabs'), function () {
                    var tabsItem = $(this).find('a'),
                        tabs = $(this),
                        leftActive = tabs.find('.active').children('a').position().left,
                        widthActive = tabs.find('.active').children('a').width();

                    $('.tabs-hr').css({
                        left: leftActive,
                        width: widthActive
                    });
                    tabsItem.on('click', function () {
                        var left = $(this).position().left,
                            width = $(this).width();
                        $('.tabs-hr').animate({
                            left: left,
                            width: width
                        }, 500, 'easeInOutExpo');
                    });
                });
            }

        }
    })
</script>