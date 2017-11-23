<?php
$listCourse = empty($this->listCourse) ? [] : $this->listCourse;

?>
<div class="content-wrapper course" style="min-height: 915.8px;">
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
                <form action="#" method="post" id="adminForm">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Table With Full Features</h3>
                        </div>
                        <?php
                        if (isset($this->success)) echo $this->success;
                        ?>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable"
                                               role="grid" aria-describedby="example1_info">
                                            <thead>
                                            <tr role="row">
                                                <th tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 20px;">
                                                    <input type="checkbox" name="checkall-toggle">
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 217px;">Tên khóa học
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending"
                                                    style="width: 300.4px;">Playlist
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending"
                                                    style="width: 267.4px;">Category
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 135px;">Created
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 200.6px;">Created by
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 135.6px;">Modified
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 200.6px;">Modified By
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 100px;">Status
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 200px;">Action
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($listCourse as $key => $value) {
                                                $urlEdit = URL::createLink('admin', 'course', 'ajaxEditCourse', ['id' => $value['id']]);
                                                $urlDelete = URL::createLink('admin', 'course', 'delete', ['id' => $value['id']])
                                                ?>
                                                <tr role="row" class="odd">
                                                    <td><input type="checkbox" name="cid[]"
                                                               value="<?php echo $value['id'] ?>"></td>
                                                    <td class="sorting_1"><?php echo $value['name'] ?></td>
                                                    <td><?php echo $value['link'] ?></td>
                                                    <td><?php echo $value['category'] ?></td>
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
                                                        $onclick = URL::createLink('admin', 'course', 'ajaxStatus', ['id' => $value['id'], 'status' => $value['status']]);
                                                        echo '<span class="glyphicon glyphicon-' . $gly_val . '" onclick="javascript:ajaxStatus(\'' . $onclick . '\')" id="status-' . $value['id'] . '"></span>';
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <!--Sửa Category-->
                                                        <section class="pull-left">
                                                            <button type="button" class="btn btn-primary "
                                                                    data-toggle="modal"
                                                                    data-target="#modal-category-edit"
                                                                    onclick="javascript:ajaxEdit('<?php echo $urlEdit ?>')">
                                                                <span class="glyphicon glyphicon-pencil"></span>
                                                            </button>
                                                            <form action="#" method="post"
                                                                  id="submit-form" role="form">
                                                                <div class="modal fade" id="modal-category-edit"
                                                                     style="display: none;">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                                <h4 class="modal-title">Sửa
                                                                                    Category</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                        class="btn btn-default pull-left"
                                                                                        data-dismiss="modal">Hủy
                                                                                </button>
                                                                                <button type="submit"
                                                                                        class="btn btn-primary submit-form"
                                                                                >Sửa
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.modal-content -->
                                                                    </div>
                                                                    <!-- /.modal-dialog -->
                                                                </div>
                                                            </form>
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
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                            <h4 class="modal-title">Bạn có muốn xóa
                                                                                không?</h4>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-default pull-left"
                                                                                    data-dismiss="modal">Không
                                                                            </button>
                                                                            <a href="<?php echo $urlDelete ?>"
                                                                               class="btn btn-danger">Có</a>
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
                                            <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">
                                                    <button type="submit" class="btn btn-danger">
                                                        Delete Ckecked
                                                    </button>
                                                </th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </form>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>