<?php
$infoCategory = $this->infoCategory;
$inputRadio = '';
if ($infoCategory['status']) {
    $inputRadio .= '<label>';
    $inputRadio .= '<input type="radio" name="status" id="status" value="1" checked>On ';
    $inputRadio .= '</label>';
    $inputRadio .= '<label style="margin-left: 20px">';
    $inputRadio .= '<input type="radio" name="status" value="0">Off';
    $inputRadio .= '</label>';
}else{
    $inputRadio .= '<label>';
    $inputRadio .= '<input type="radio" name="status" id="status" value="1">On ';
    $inputRadio .= '</label>';
    $inputRadio .= '<label style="margin-left: 20px">';
    $inputRadio .= '<input type="radio" name="status" value="0" checked>Off';
    $inputRadio .= '</label>';
}
?>
<div class="box-body ">
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
                   name="name" value="<?php echo $this->infoCategory['name'] ?>"
                   id="<?php echo $this->infoCategory['id'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Status:</label>
        <div class="col-sm-9">
            <div class="radio">
                <?php echo  $inputRadio?>
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->

