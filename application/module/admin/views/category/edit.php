<?php
$infoCategory = empty($this->infoCategory) ? [] : $this->infoCategory;
?>
<div class="box-body edit-modal">
   <?php
                      if (isset($this->errors)) echo $this->errors;
                      if (isset($this->success)) echo $this->success;
                      ?>
    <div class="row">
        <label class="col-sm-3 control-label">Tên Category <i style="color: red">*</i></label>

        <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Tên Category" name="category" value="<?php echo $this->infoCategory['name'] ?>">
        </div>
    </div>
     <div class="row" style="margin:20px 0 20px -15px">
            <label class="col-sm-3 control-label">Hình hiện tại</label>

            <div class="col-sm-9" style="height: 50px">
               <img src="<?php echo TEMPLATE_URL . '/admin/main/images/' . $infoCategory['picture'] ?>"
                                                                               alt=""
                                                                               height="100%">
            </div>
        </div>
    <div class="row ">
        <label class="col-sm-3 control-label">Hình ảnh</label>

        <div class="col-sm-9">
            <input type="file" class="form-control" onchange="readURL(this);" name="image">
            <input type="hidden" value="<?php echo $infoCategory['id'] ?>" name="id">
            <div class="blah">
                <img id="blah" src="#"/>
            </div>
        </div>
    </div>

</div>