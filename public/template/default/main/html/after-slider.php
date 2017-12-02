<?php
$listFindCourse = isset($this->listFindCourse) ? $this->listFindCourse : [];
$url = [
    "find" => URL::createLink("default", "index", "find")
];
?>
<section id="after-slider" class="after-slider section">
    <form action="" method="post" id="adminForm">
        <div class="awe-color bg-color-1"></div>
        <div class="after-slider-bg-2"></div>
        <div class="container">

            <div class="after-slider-content tb">
                <div class="inner tb-cell">
                    <h4>Tìm kiếm khóa học</h4>
                    <div class="course-keyword">
                        <input type="text" placeholder="Nhập tên khóa học" name="form[search]" required>
                    </div>
                    <div class="mc-select-wrap">
                        <div class="mc-select">
                            <select class="select" name="form[find]" id="all-categories">
                                <option value="0" selected>Tất cả categories</option>
                                <?php foreach ($listFindCourse as $value) { ?>
                                    <option value="<?php echo $value['id'] ?>"
                                            name="form[find]"><?php echo $value['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="tb-cell text-right">
                    <div class="form-actions">
                        <input type="button" value="Tìm khóa học" class="mc-btn btn-style-1"
                               onclick="javascript:submitForm('<?php echo $url['find'] ?>')"
                        >
                    </div>
                </div>
            </div>

        </div>
    </form>
</section>