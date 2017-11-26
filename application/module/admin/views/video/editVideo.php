<?php
$listCourse = empty($this->listCourse) ? [] : $this->listCourse;
$infoItem = empty($this->infoItem) ? ['name' => '', 'category_id' => 0, 'link' => ''] : $this->infoItem;
$course_id = isset($infoItem ['course_id']) ? $infoItem['course_id'] : 0;
$selectBox = Helper::cmsSelecbox($listCourse, 'course_id', 'form-control', $course_id);
?>
<div class="box-body">
    <?php
    if (isset($this->errors)) echo $this->errors;
    if (isset($this->success)) echo $this->success;
    ?>
    <div class="form-group">
        <label class="col-sm-3 control-label">Title<i style="color: red"> *</i></label>
        <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Tên Video" name="title"
                   value="<?php if (isset($infoItem['title'])) echo $infoItem['title'] ?>"
            >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Link Youtube<i style="color: red"> *</i></label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="link" placeholder="Link Youtube"
                   value="<?php if (isset($infoItem['link'])) echo $infoItem['link'] ?>"
            >
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Course<i style="color: red"> *</i></label>

        <div class="col-sm-9">
            <?php echo $selectBox ?>
        </div>
    </div>
    <input type="hidden" value="<?php echo $infoItem['id'] ?>">
</div>

