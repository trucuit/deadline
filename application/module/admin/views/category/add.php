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
        <label class="col-sm-3 control-label">Status:</label>
        <div class="col-sm-9">
            <select name="status" id="status" class="form-control">
                <option value="1">on</option>
                <option value="0">off</option>
            </select>
        </div>
    </div>

</div>
<!-- /.box-body -->

