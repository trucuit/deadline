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
        <select name="status" id="status">
            <option value="1">on</option>
            <option value="0">off</option>
        </select>


    </div>

</div>
<!-- /.box-body -->

