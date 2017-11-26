<?php
$listCategory = empty($this->listCategory) ? [] : $this->listCategory;

$url = array(
    'category' => [
        'add' => URL::createLink('admin', 'category', 'ajaxAdd'),
        'active' => URL::createLink('admin', 'category', 'ajaxActive'),
        'inactive' => URL::createLink('admin', 'category', 'ajaxInactive'),
        'delete' => URL::createLink('admin', 'category', 'ajaxDelete'),
    ]
);
?>
<div class="content-wrapper category" style="min-height: 915.8px;" xmlns="http://www.w3.org/1999/html">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage Category
            <small>List</small>
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
                    <!--                    <form action="" method="post">-->

                    <div class="box-header text-center">
                        <button class="btn btn-app btn-add" data-toggle="modal" data-target="#modal-add"
                                onclick="javascript:ajaxAdd('<?php echo $url['category']['add'] ?>')"
                        >
                            <i class="fa fa-plus-square-o"></i> Add
                        </button>
                        <button form="adminForm" class="btn btn-app btn-active" data-toggle="modal"
                                data-target="#modal-action"
                        >
                            <i class="fa fa-check-circle-o"></i> Active

                        </button>
                        <button form="adminForm" class="btn btn-app btn-inactive" data-toggle="modal"
                                data-target="#modal-action">
                            <i class="fa fa-circle-o"></i> Inactive
                        </button>
                        <button form="adminForm" class="btn btn-app btn-delete" data-toggle="modal"
                                data-target="#modal-action">
                            <i class="fa fa-minus-square-o"></i> Delete
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
                                                <th><input type="checkbox" name="checkall-toggle"></th>
                                                <th class="sorting_asc">Name</th>
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
                                            $i = 0;
                                            foreach ($listCategory as $key => $value) {
                                                $urlEdit = URL::createLink('admin', 'category', 'ajaxEditCategory', ['id' => $value['id']]);
                                                $urlDelete = URL::createLink('admin', 'category', 'delete', ['id' => $value['id']])
                                                ?>
                                                <tr role="row" class="odd">
                                                    <td><input type="checkbox" name="cid[]"
                                                               value="<?php echo $value['id'] ?>"></td>
                                                    <td class="sorting_1"><?php echo $value['name'] ?></td>
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
                                                    <td><?php echo $value['id'] ?></td>
                                                </tr>

                                                <?php
                                                $i++;
                                            } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                    <!-- /.box-body -->
                </div>
                <!--            </form>-->
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

    <!-- /.content -->
</div>

<!-- Modal add -->
=======
<!-- Modal -->
<form class="form-horizontal" action="#" method="post" enctype="multipart/form-data" id="form-add">
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">ADD </h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="box-footer">
                    <button type="submit" class="btn pull-right btn-primary submit-add">Save & New</button>
                    <button type="submit" class="btn btn-primary pull-right submit-close">Save & Close</button>
                    <button class="btn btn-default" data-dismiss="modal">Hủy</button>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
    </div>
</form>
<!-- /.Modal -->
<!--modal Active-->

<div class="modal fade" id="modal-action" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Successed</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default close-active " data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
