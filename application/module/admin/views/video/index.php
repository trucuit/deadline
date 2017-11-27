<?php
$listItem = empty($this->listItem) ? [] : $this->listItem;
$url = array(
    'video' => [
        'add' => URL::createLink('admin', 'video', 'addAjax'),
        'active' => URL::createLink('admin', 'video', 'status', ['type' => 1]),
        'inactive' => URL::createLink('admin', 'video', 'status', ['type' => 0]),
        'delete' => URL::createLink('admin', 'video', 'delete'),
    ]
);
?>
<div class="content-wrapper category" style="min-height: 915.8px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage Video
            <small>List <span style="color: red">* Click vào link để xem chi tiết</span></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Video</a></li>
            <li class="active">List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header text-center">
                        <button class="btn btn-app" data-toggle="modal" data-target="#modal-add"
                                onclick="javascript:ajaxAdd('<?php echo $url['video']['add'] ?>')"
                        >
                            <i class="fa fa-plus-square-o"></i> Add
                        </button>
                        <button class="btn btn-app"
                                onclick="javascript:submitFormVideo('<?php echo $url['video']['active'] ?>')"
                        >
                            <i class="fa fa-check-circle-o"></i> Active
                        </button>
                        <button class="btn btn-app"
                                onclick="javascript:submitFormVideo('<?php echo $url['video']['inactive'] ?>')"
                        >
                            <i class="fa fa-circle-o"></i> Inactive
                        </button>
                        <button class="btn btn-app"
                                onclick="javascript:submitFormVideo('<?php echo $url['video']['delete'] ?>')"
                        >
                            <i class="fa fa-minus-square-o"></i> delete
                        </button>
                    </div>
                    <?php
                    if (isset($this->success)) echo $this->success;
                    ?>
                    <!-- /.box-header -->
                    <form action="#" method="post" id="adminForm">
                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable"
                                               role="grid" aria-describedby="example1_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="no-sort"><input type="checkbox" name="checkall-toggle"></th>
                                                <th class="sorting_asc">Title</th>
                                                <th>Link</th>
                                                <th>Course</th>
                                                <th >Status</th>
                                                <th>Ordering</th>
                                                <th>ID</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($listItem as $key => $value) {
                                                $urlEdit = URL::createLink('admin', 'video', 'editAjax', ['id' => $value['id']]);
                                                $urlDelete = URL::createLink('admin', 'video', 'delete', ['id' => $value['id']])
                                                ?>
                                                <tr role="row" class="odd">
                                                    <td><input type="checkbox" name="cid[]"
                                                               value="<?php echo $value['id'] ?>"></td>
                                                    <td class="sorting_1">
                                                        <a href="#"
                                                           data-toggle="modal" data-target="#modal-edit"
                                                           onclick="javascript:ajaxEdit('<?php echo $urlEdit ?>')">
                                                            <?php echo $value['title'] ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a data-toggle="modal" data-target="#modal-show-video"
                                                           href="#"
                                                           onclick="javascript:ajaxShowVideo('<?php echo $value['link'] ?>','video')"
                                                        >
                                                            <?php echo $value['link'] ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $value['courseName'] ?></td>
                                                    <td class="text-center status">
                                                        <?php
                                                        $onclick = URL::createLink('admin', 'video', 'ajaxStatus', ['id' => $value['id'], 'status' => $value['status']]);
                                                        echo '<i onclick="javascript:ajaxStatus(\'' . $onclick . '\')" id="status-' . $value['id'] . '">' . ($value['status'] ? 'on' : 'off') . '</i>';
                                                        ?>
                                                    </td>
                                                    <td><?php echo $value['ordering'] ?></td>
                                                    <td><?php echo $value['id'] ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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

<!-- Modal -->

<!-- Add Video-->
<form class="form-horizontal form-add-video" action="#" method="post" enctype="multipart/form-data" id="form-add">
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Add Video</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body…</p>
                </div>
                <div class="box-footer text-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary submit-form" id="save-close">Save & Close</button>
                    <button type="submit" class="btn btn-primary submit-form" id="save-new">Save & New</button>
                </div>
            </div>
        </div>
        <div id="xoay">
            <div id="loader" style="display: none"></div>
        </div>
    </div>
</form>

<!-- Edit Video -->
<form class="form-horizontal form-edit-video" action="#" method="post" enctype="multipart/form-data" id="form-edit">
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Edit Video</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body…</p>
                </div>
                <div class="box-footer text-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary submit-form" id="save-new">Save</button>
                </div>
            </div>
        </div>
        <div id="xoay">
            <div id="loader" style="display: none"></div>
        </div>
    </div>
</form>

<!-- Show Video -->
<div class="modal fade in" id="modal-show-video">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></a>
                <h4 class="modal-title">Play Video</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="box-footer text-center">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a class="btn btn-primary" id="youtube" target="_blank">Youtube</a>
            </div>
        </div>
    </div>

</div>

<!-- /.Modal -->
