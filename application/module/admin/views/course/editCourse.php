<?php
$listCategory = empty($this->listCategory) ? [] : $this->listCategory;
$infoCourse = empty($this->infoCourse) ? [] : $this->infoCourse;

$selectBox = Helper::cmsSelecbox($listCategory,'category_id','form-control',$infoCourse['category_id'])
?>
<div class="box-body edit-modal">
    <?php
    if (isset($this->errors)) echo $this->errors;
    if (isset($this->success)) echo $this->success;
    ?>
    <div class="row">
        <label class="col-sm-3 control-label">Tên Category <i style="color: red">*</i></label>

        <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Tên Category" name="name" value="<?php echo $infoCourse['name'] ?>">
        </div>
    </div>
    <div class="row ">
        <label class="col-sm-3 control-label">Link<i style="color: red">*</i></label>

        <div class="col-sm-9">
            <input type="text" value="<?php echo $infoCourse['link'] ?>" name="link">
        </div>
    </div>
    <div class="row ">
        <label class="col-sm-3 control-label">Chọn Category<i style="color: red">*</i></label>

        <div class="col-sm-9">
            <?php echo $selectBox ?>
        </div>
    </div>

    <input type="hidden" value="<?php echo $infoCourse['id'] ?>" name="id">
</div>
