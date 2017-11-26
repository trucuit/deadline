<div class="box-body ">
    <?php
    if (isset($this->errors)) {
        echo $this->errors;
    }
    if (isset($this->success)) {
        echo $this->success;
    }
    ?>
    <input type="hidden" name="id" value="<?php echo $this->infoCategory['id'] ?>">
    <div class="form-group">
        <label class="col-sm-3 control-label">Tên Category <i style="color: red">*</i></label>
        <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Tên Category"
                   name="name" value="<?php echo $this->infoCategory['name'] ?>"
                   id="<?php echo $this->infoCategory['id'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Status:</label>
        <div class="col-sm-9">
            <?php if ($this->infoCategory['status'] == 1) {
                ?>
                <select name="status" id="status" class="form-control">
                    <option value="1">on</option>
                    <option value="0">off</option>

                </select>
                <?php
            } else {
                ?>
                <select name="status" id="status" class="form-control">
                    <option value="0">off</option>
                    <option value="1">on</option>
                </select>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- /.box-body -->

