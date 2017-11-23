<form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-3 control-label">Tên Category <i style="color: red">*</i></label>

            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Tên Category"
                       name="form[category]">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Hình ảnh</label>

            <div class="col-sm-9">
                <input type="file" class="form-control" onchange="readURL(this);" name="image">
                <div class="blah">
                    <img id="blah" src="#"/>
                </div>

            </div>
        </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn pull-right btn-primary">Thêm</button>
        <a href="<?php echo $url['cancel'] ?>" class="btn btn-default">Hủy</a>
    </div>
    <!-- /.box-footer -->
</form>