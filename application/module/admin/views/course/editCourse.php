<?php
$listCategory = empty($this->listCategory) ? [] : $this->listCategory;
$infoItem = empty($this->infoItem) ? ['name' => '', 'category_id' => 0, 'link' => ''] : $this->infoItem;
$catefory_id = isset($infoItem ['category_id']) ? $infoItem['category_id'] : 0;

$selectBox = Helper::cmsSelecbox($listCategory, 'category_id', 'form-control', $catefory_id);
?>
<div class="box-body">
    <div class="box-body edit-modal">
        <?php
        if (isset($this->errors)) echo $this->errors;
        if (isset($this->success)) echo $this->success;
        ?>
        <div class="form-group">
            <label class="col-sm-3 control-label">Name<i style="color: red"> *</i></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="name" placeholder="Course"
                       value="<?php if (isset($infoItem['name'])) echo $infoItem['name'] ?>"
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
            <label class="col-sm-3 control-label">Current Image</label>
            <div class="col-sm-9">
                <img src="<?php echo $this->_dirImg . "/" . $infoItem['image'] ?>"
                     alt="" height="40px">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Image</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" onchange="readURL(this);" name="image">
                <span class="help-block"><i style="color: red"> *</i>Select a new one if you want to change it</span>
                <div class="blah">
                    <img id="blah" src="#" height="50px"/>
                </div>
            </div>
        </div>

        <div class="form-group">

            <label class="col-sm-3 control-label">Category<i style="color: red">*</i></label>

            <div class="col-sm-9">
                <?php echo $selectBox ?>
            </div>
        </div>
        <!-- /.box-body -->

        <!-- /.box-footer -->
    </div>
    <input type="hidden" value="<?php echo $infoItem['id'] ?>">
</div>
