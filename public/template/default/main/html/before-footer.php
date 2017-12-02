<?php
$statistics = $this->statistics;
?>
<section id="before-footer" class="before-footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 text-center">
                <div class="mc-count-item">
                    <h4>Category</h4>
                    <p><span class="countup"><?php echo $statistics[DB_TBCOURSE] ?></span></p>
                </div>
                <div class="mc-count-item">
                    <h4>Courses</h4>
                    <p><span class="countup"><?php echo $statistics[DB_TBCATEGORY] ?></span></p>
                </div>
                <div class="mc-count-item">
                    <h4>Teachers</h4>
                    <p><span class="countup"><?php echo $statistics[DB_TBAUTHOR] ?></span></p>
                </div>
                <div class="mc-count-item">
                    <h4>Video</h4>
                    <p><span class="countup"><?php echo $statistics[DB_TBVIDEO] ?></span></p>
                </div>
            </div>
        </div>
    </div>
</section>