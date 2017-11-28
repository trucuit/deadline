<?php
$infoItem = empty($this->infoItem) ? ['name' => '', 'category_id' => 0, 'link' => ''] : $this->infoItem;
?>
<div class="box-body">
    <?php
    if (isset($this->errors)) echo $this->errors;
    if (isset($this->success)) echo $this->success;
    ?>
    <div class="form-group">
        <label class="col-sm-3 control-label">Author<i style="color: red"> *</i></label>
        <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Author" name="name"
                   value="<?php if (isset($infoItem['name'])) echo $infoItem['name'] ?>"
            >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Avatar</label>
        <div class="col-sm-9">
            <input type="file" class="form-control" onchange="readURL(this);" name="avatar">
            <div class="blah">
                <img id="blah" src="#" height="50px"/>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Info</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Info" name="info"
                   value="<?php if (isset($infoItem['info'])) echo $infoItem['info'] ?>"
            >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Email</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Email" name="email"
                   value="<?php if (isset($infoItem['email'])) echo $infoItem['email'] ?>"
            >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Facebook</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Facebook" name="facebook"
                   value="<?php if (isset($infoItem['facebook'])) echo $infoItem['facebook'] ?>"
            >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Phone</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Phone" name="phone"
                   value="<?php if (isset($infoItem['phone'])) echo $infoItem['phone'] ?>"
            >
        </div>
    </div>
</div>
<!-- /.box-body -->

<!-- /.box-footer -->

