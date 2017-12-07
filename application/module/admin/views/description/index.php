<?php
$listItem = empty($this->listItem) ? [] : $this->listItem;
$url = array(
    'add' => URL::createLink('admin', DB_TBDESCRIPTION, 'add'),
    'edit' => URL::createLink('admin', DB_TBDESCRIPTION, 'edit'),
    'delete' => URL::createLink('admin', DB_TBDESCRIPTION, 'delete'),
);

?>
<div class="content-wrapper" style="min-height: 915.8px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage&nbsp;<?php echo ucfirst($this->arrParam['controller']) ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i><?php echo ucfirst($this->arrParam['module']) ?></a></li>
            <li><a href="#"><?php echo ucfirst($this->arrParam['controller']) ?></a></li>
            <li class="active"><?php echo ucfirst($this->arrParam['action']) ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header text-center">
                        <button class="btn btn-app"
                                onclick="javascript:submitForm('<?php echo $url['add'] ?>')"
                        >
                            <i class="fa fa-plus-square-o"></i> Add
                        </button>
                        <button class="btn btn-app btn-delete"
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
                                                <th>Course</th>
                                                <th>Description</th>
                                                <th>Created</th>
                                                <th>Created by</th>
                                                <th>Modified</th>
                                                <th>Modified By</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($listItem as $key => $value) {
                                                ?>
                                                <tr role="row" class="odd">
                                                    <td><input type="checkbox" name="cid[]"
                                                               value="<?php echo $value['id'] ?>"></td>
                                                    <td class="sorting_1">
                                                        <a href="#"
                                                           onclick="submitForm('<?php echo $url['edit'] . "&id=" . $value['id'] ?>')"
                                                        >
                                                            <?php echo $value['name'] ?></a>
                                                    </td>
                                                    <td><?php echo $value['description'] ?></td>
                                                    <td><?php echo $value['created'] ?></td>
                                                    <td><?php echo $value['created_by'] ?></td>
                                                    <td><?php echo $value['modified'] ?></td>
                                                    <td><?php echo $value['modified_by'] ?></td>
                                                </tr>

                                                <?php
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
