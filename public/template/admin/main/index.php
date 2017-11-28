<?php
$dirImg = $this->_dirImg;
$dirAdminLTE = $this->_dirAdminLTE;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->_title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo $dirAdminLTE ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $dirAdminLTE ?>/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo $dirAdminLTE ?>/bower_components/Ionicons/css/ionicons.min.css">
    <!--  Table  -->
    <link rel="stylesheet"
          href="<?php echo $dirAdminLTE ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $dirAdminLTE ?>/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo $dirAdminLTE ?>/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo $dirAdminLTE ?>/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo $dirAdminLTE ?>/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet"
          href="<?php echo $dirAdminLTE ?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet"
          href="<?php echo $dirAdminLTE ?>/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo $dirAdminLTE ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <?php echo $this->_fileCSS ?>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script type="text/javascript">
        root_url =  <?php echo json_encode(ROOT_URL ."/")  ?>;
        const ROOT_URL = root_url;
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php include_once 'html/header.php' ?>
    <!-- Left side column. contains the logo and sidebar -->

    <?php include_once 'html/mainSidebar.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <?php require_once MODULE_PATH . DS . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php'; ?>
    <!-- /.content-wrapper -->
    <?php include_once 'html/footer.php' ?>
    <!-- Control Sidebar -->
    <?php include_once 'html/controlSidebar.php' ?>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo $dirAdminLTE ?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $dirAdminLTE ?>/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);

</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $dirAdminLTE ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo $dirAdminLTE ?>/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo $dirAdminLTE ?>/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo $dirAdminLTE ?>/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo $dirAdminLTE ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo $dirAdminLTE ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo $dirAdminLTE ?>/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo $dirAdminLTE ?>/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo $dirAdminLTE ?>/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo $dirAdminLTE ?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo $dirAdminLTE ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo $dirAdminLTE ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $dirAdminLTE ?>/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $dirAdminLTE ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $dirAdminLTE ?>/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- DataTables -->
<script src="<?php echo $dirAdminLTE ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $dirAdminLTE ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Demo -->
<script src="<?php echo $dirAdminLTE ?>/dist/js/demo.js"></script>
<?php echo $this->_fileJS ?>
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
</body>
</html>
