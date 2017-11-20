 <?php 

  ?>
 <div class="box-body">
    <div class="row mb-2">
        <label class="col-sm-3 control-label">Tên Category <i style="color: red">*</i></label>

        <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Tên Category" name="form[category]" value="<?php echo $this->infoCategory['name'] ?>">
        </div>
    </div>
    <div class="row ">
        <label class="col-sm-3 control-label">Hình ảnh</label>

        <div class="col-sm-9">
            <input type="file" class="form-control" onchange="readURL(this);" name="image">
            <div class="blah">
                <img id="blah" src="#"/>
            </div>

        </div>
    </div>

</div>