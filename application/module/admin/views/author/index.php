<?php
$listItem = empty($this->listItem) ? [] : $this->listItem;
$url = array(
    'add' => URL::createLink('admin', 'author', 'addAjax'),
    'active' => URL::createLink('admin', 'author', 'status', ['type' => 1]),
    'inactive' => URL::createLink('admin', 'author', 'status', ['type' => 0]),
    'delete' => URL::createLink('admin', 'author', 'delete'),
);
?>
<div class="content-wrapper category" style="min-height: 915.8px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage Author
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Author</a></li>
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
                                onclick="javascript:ajaxAdd('<?php echo $url['add'] ?>')"
                        >
                            <i class="fa fa-plus-square-o"></i> Add
                        </button>
                        <button class="btn btn-app"
                                onclick="javascript:submitForm('<?php echo $url['active'] ?>')"
                        >
                            <i class="fa fa-check-circle-o"></i> Active
                        </button>
                        <button class="btn btn-app"
                                onclick="javascript:submitForm('<?php echo $url['inactive'] ?>')"
                        >
                            <i class="fa fa-circle-o"></i> Inactive
                        </button>
                        <button class="btn btn-app"
                                onclick="javascript:submitForm('<?php echo $url['delete'] ?>')"
                        >
                            <i class="fa fa-minus-square-o"></i> Delete
                        </button>
                    </div>
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
                                                <th class="sorting">Name</th>
                                                <th class="no-sort">Avatar</th>
                                                <th class="sorting">Info</th>
                                                <th class="sorting">Email</th>
                                                <th class="sorting">Facebook</th>
                                                <th class="sorting">Phone</th>
                                                <th class="sorting">Created</th>
                                                <th class="sorting">Created by</th>
                                                <th class="sorting">Modified</th>
                                                <th class="sorting">Modified By</th>
                                                <th class="sorting">Status</th>
                                                <th class="sorting">ID</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($listItem as $key => $value) {
                                                $urlEdit = URL::createLink('admin', 'author', 'ajaxEdit', ['id' => $value['id']]);
                                                $urlDelete = URL::createLink('admin', 'author', 'delete', ['id' => $value['id']])
                                                ?>
                                                <tr role="row" class="odd">
                                                    <td>
                                                        <input type="checkbox" name="cid[]"
                                                               value="<?php echo $value['id'] ?>">
                                                    </td>
                                                    <td class="sorting_1">
                                                        <a href="" data-toggle="modal"
                                                           data-target="#modal-edit"
                                                           onclick="javascript:ajaxEdit('<?php echo $urlEdit ?>')"
                                                        >
                                                            <?php echo $value['name'] ?>
                                                        </a>
                                                    </td>
                                                    </td>
                                                    <td>
                                                        <img src="<?php echo $this->_dirImg . "/" . $value['avatar'] ?>"
                                                             alt="" height="40px">
                                                        </a>
                                                    </td>
                                                    <td><?php echo $value['info'] ?></td>
                                                    <td><?php echo $value['email'] ?></td>
                                                    <td><?php echo $value['facebook'] ?></td>
                                                    <td><?php echo $value['phone'] ?></td>
                                                    <td><?php echo $value['created'] ?></td>
                                                    <td><?php echo $value['created_by'] ?></td>
                                                    <td><?php echo $value['modified'] ?></td>
                                                    <td><?php echo $value['modified_by'] ?></td>
                                                    <td class="text-center status">
                                                        <?php
                                                        $onclick = URL::createLink('admin', 'course', 'ajaxStatus', ['id' => $value['id'], 'status' => $value['status']]);
                                                        echo '<i onclick="javascript:ajaxStatus(\'' . $onclick . '\')" id="status-' . $value['id'] . '">' . ($value['status'] ? 'on' : 'off') . '</i>';
                                                        ?>
                                                    </td>
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

<form class="form-horizontal form-add-author" action="#" method="post" enctype="multipart/form-data" id="form-add">
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Add Author</h4>
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
<form class="form-horizontal form-edit-author" action="#" method="post" enctype="multipart/form-data"
      id="form-edit">
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Edit Author</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body…</p>
                </div>
                <div class="box-footer text-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary submit-form">Save</button>
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
                <h4 class="modal-title">List Video</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="box-footer text-center">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--                <a class="btn btn-primary" id="youtube" target="_blank">Youtube</a>-->
            </div>
        </div>
    </div>

</div>

<!-- /.Modal -->
