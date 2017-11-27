<div class="box-body">
    <?php
    if (isset($this->errors)) {
        echo $this->errors;
    }
    if (isset($this->success)) {
        echo $this->success;
    }
    ?>
    <div class="form-group">
        <label class="col-sm-3 control-label">Tên Category <i style="color: red">*</i></label>

        <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Tên Category"
                   name="name">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Status <i style="color: red">*</i></label>
        <div class="col-sm-9">
            <div class="radio">
                <label>
                    <input type="radio" name="status" id="status" value="1">On
                </label>
                <label style="margin-left: 20px">
                    <input type="radio" name="status" value="0" checked>Off
                </label>
            </div>
        </div>
    </div>

</div>
<!-- /.box-body -->

