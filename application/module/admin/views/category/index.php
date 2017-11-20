<?php
$listCategory = $this->listCategory;
?>
<div class="content-wrapper" style="min-height: 915.8px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Data Tables
        <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable"
                                        role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 217px;">Tên khóa học</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 267.4px;">Hình ảnh</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 237px;">Created</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                style="width: 186.6px;">Created by</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 135.6px;">Modified</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 135.6px;">Modified By</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 135.6px;">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 135.6px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($listCategory as $key => $value) {
                                            $urlEdit = URL::createLink('admin','category','ajaxEditCategory',['id'=>$value['id']])
                                            ?>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><?php echo $value['name'] ?></td>
                                                <td><img src="<?php echo $value['picture'] ?>" alt="" width="50%"></td>
                                                <td><?php echo $value['created'] ?></td>
                                                <td><?php echo $value['created_by'] ?></td>
                                                <td><?php echo $value['modified'] ?></td>
                                                <td><?php echo $value['modified_by'] ?></td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($value['status'])
                                                    $gly_val = 'ok';
                                                    else
                                                    $gly_val = 'remove';
                                                    $onclick = URL::createLink('admin', 'category', 'ajaxStatus', ['id' => $value['id'], 'status' => $value['status']]);
                                                    echo '<span class="glyphicon glyphicon-' . $gly_val . '" onclick="javascript:ajaxStatus(\'' . $onclick . '\')" id="status-' . $value['id'] . '"></span>';
                                                    ?>
                                                </td>
                                                <td>
                                                    <!--Sửa Category-->
                                                    <section class="pull-left">
                                                        <button type="button" class="btn btn-primary "
                                                        data-toggle="modal"
                                                        data-target="#modal-category-edit"
                                                        onclick="javascript:ajaxEdit('<?php echo $urlEdit ?>')"
                                                        >
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                                        <div class="modal fade" id="modal-category-edit"
                                                            style="display: none;">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close"
                                                                        data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                        <h4 class="modal-title">Sửa Category</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                        class="btn btn-default pull-left"
                                                                        data-dismiss="modal">Không
                                                                        </button>
                                                                        <button type="submit"
                                                                        class="btn btn-primary submit-form">Có
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                    </section>
                                                    <!--Xóa Category-->
                                                    <section class="pull-right">
                                                        <button type="button" class="btn btn-danger "
                                                        data-toggle="modal"
                                                        data-target="#modal-category-trash">
                                                        <i class="fa fa-fw fa-trash-o"></i>
                                                        </button>
                                                        <div class="modal fade" id="modal-category-trash"
                                                            style="display: none;">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close"
                                                                        data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                        <h4 class="modal-title">Bạn có muốn xóa
                                                                        không?</h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                        class="btn btn-default pull-left"
                                                                        data-dismiss="modal">Không
                                                                        </button>
                                                                        <button type="submit"
                                                                        class="btn btn-danger submit-form">Có
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                    </section>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>