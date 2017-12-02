<?php
$urlImage = $this->_dirImg;
$urlFile = TEMPLATE_URL . '/default/main';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- Css -->
    <?php

    echo $this->_metaHTTP;
    echo $this->_metaName;
    echo $this->_fileCSS
    ?>
    <title><?php echo $this->_title ?></title>

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <script type="text/javascript">
        root_url =  <?php echo json_encode(ROOT_URL . "/")  ?>;
        const ROOT_URL = root_url;
    </script>
</head>
<body id="page-top" class="home">

<!-- PAGE WRAP -->
<div id="page-wrap">

    <!-- PRELOADER -->
    <?php include_once "html/preloader.php"; ?>
    <!-- END / PRELOADER -->

    <!-- HEADER -->
    <?php include_once "html/header.php"; ?>
    <!-- END / HEADER -->

    <?php
    if ($this->arrParam['url'] == 'default/index/index') {
        echo '<!--HOME SLIDER-->';
        include_once "html/slider.php";
        echo '<!--END / HOME SLIDER-->';
    } else if ($this->arrParam['url'] == 'default/courses/index') {
        echo '<!--SUB BANNER-->';
        include_once "html/sub-banner.php";
        echo '<!--END / SUB BANNER-->';
    }

?>
    <?php
        if ($this->arrParam['url'] == 'default/index/index'){

    echo '<!-- AFTER SLIDER -->';
        include_once "html/after-slider.php";
    echo '<!-- END / AFTER SLIDER -->';
        }

    ?>

    <?php require_once MODULE_PATH . DS . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php'; ?>

    <?php
    if($this->arrParam['url']== 'default/index/index'){
       echo '<!-- BEFORE FOOTER -->';
     include_once "html/before-footer.php";
        echo '<!-- END / BEFORE FOOTER -->';
    }
    ?>



        <!-- FOOTER -->
    <?php include_once "html/footer.php"; ?>
    <!-- END / FOOTER -->


</div>
<!-- END / PAGE WRAP -->

<!-- Load jQuery -->
<?php echo $this->_fileJS ?>
</body>
</html>