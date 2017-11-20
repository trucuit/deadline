<?php
$userInfo = Session::get('login')['user'];
?>

<div class="content-wrapper" style="min-height: 1125.8px;" id="profile">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">User profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle"
                             src="<?php echo $dirAdminLTE ?>/dist/img/user4-128x128.jpg"
                             alt="User profile picture">

                        <h3 class="profile-username text-center"><?php echo $userInfo['fullname'] ?></h3>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Username</b> <a class="pull-right"><?php echo $userInfo['username'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="pull-right"><?php echo $userInfo['email'] ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#changeInfo" data-toggle="tab" aria-expanded="true">Change Info</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="changeInfo">
                            <form class="form-horizontal" method="post" action="#">
                                <?php
                                if (isset($this->errors)) echo $this->errors;
                                if (isset($this->success)) echo $this->success;
                                ?>

                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Username</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Username"
                                               value="<?php echo $userInfo['username'] ?>" name="form[username]">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Full Name</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Fullname"
                                               value="<?php echo $userInfo['fullname'] ?>" name="form[fullname]">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email"
                                               value="<?php echo $userInfo['email'] ?>" name="form[email]">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputEmail"
                                               placeholder="Password" name="form[password]">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <section>
                                            <button type="button" class="btn btn-default" data-toggle="modal"
                                                    data-target="#modal-default">
                                                Change Info
                                            </button>
                                            <div class="modal fade" id="modal-default" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">×</span></button>
                                                            <h4 class="modal-title">Bạn có muốn thay đổi không?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left"
                                                                    data-dismiss="modal">Không
                                                            </button>
                                                            <button type="submit" class="btn btn-primary submit-form">Có
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
