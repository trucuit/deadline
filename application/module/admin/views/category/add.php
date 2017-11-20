<div class="content-wrapper" style="min-height: 945.8px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Category</a></li>
            <li class="active">Add</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-info">
                    <?php if(isset($this->errors)) echo $this->errors ?>
                    <!-- form start -->
                    <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tên Category <i style="color: red">*</i></label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Tên Category" name="form[category]">
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
                           
                            <section  class="pull-right">
                                <button type="button" class="btn btn-primary " data-toggle="modal"
                                        data-target="#modal-default">
                                    Thêm
                                </button>
                                <input type="hidden" name="form[token]" value="<?php echo time() ?>">
                                <div class="modal fade" id="modal-default" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title">Bạn có muốn thêm không?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                                                <button type="submit" class="btn btn-primary submit-form">Có</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </section>
                             <button type="submit" class="btn pull-right">Hủy</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>