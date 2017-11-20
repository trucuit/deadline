<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="<?php echo  $this->_dirImg ?>/logon-ico.ico">

	<?php
	echo $this->_title;
	echo $this->_metaHTTP;
	echo $this->_metaName;
	echo $this->_fileCSS;
	echo $this->_fileJS;

	$imageURL = $this->_dirImg;
	?>
</head>
<body>
	<!--header-->
	<?php include_once 'html/header.php' ?>
	<!--//header-->

	<!--banner-->
	<?php 
	if($this->_fileView =='index/index')
		include_once 'html/banner.php' 
	?>
	<!--//banner-->

	<!--content-->
	<?php include_once MODULE_PATH . DS . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php'; ?>
	<!--//content-->

	<!--footer-->
	<?php include_once 'html/footer.php' ?>
	<!--//footer-->
</body>
</html>
