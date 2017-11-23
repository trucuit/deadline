<?php
$listCategory = empty($this->listCategory) ? [] : $this->listCategory;

$url = [
    'cancel' => URL::createLink('admin','category','index')
];

$selectBox = Helper::cmsSelecbox($listCategory,'form[category_id]','form-control')
?>
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
                    <?php
                    if (isset($this->errors)) echo $this->errors;
                    if (isset($this->success)) echo $this->success;
                    ?>
                    <!-- form start -->
                    <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tên Category<i style="color: red"> *</i></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Tên Course" name="form[name]">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Link Youtube<i style="color: red"> *</i></label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="form[link]" placeholder="Link Youtube">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Category<i style="color: red"> *</i></label>

                                <div class="col-sm-9">
                                   <?php echo $selectBox ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="<?php echo $url['cancel'] ?>" class="btn btn-default">Hủy</a>
                            <button type="submit" class="btn pull-right btn-primary">Thêm</button>
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