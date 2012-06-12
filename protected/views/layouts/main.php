<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.popup.css"/>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/script.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.wookmark.min.js"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::link(Yii::app()->params['siteName'], Yii::app()->request->baseUrl) ?></div>
		
		<?php if(Yii::app()->user->isGuest) { ?>
			<div class="header-menu link-ct"><?php echo CHtml::link('Sign up', array('/user/signup')) ?></div>
			<div class="header-menu link-ct"><?php echo CHtml::link('Log in', array('/user/login')) ?></div>
		<?php } else { ?>
			<div class="header-menu link-ct"><?php echo CHtml::link('Log out', array('/user/logout')) ?></div>
			<div class="header-menu" id="enjoy_btn">Enjoy</div>
			<div style="float:right;height:12px;padding:14px 20px;font-weight:bold"> <?php echo Yii::app()->user->name ?></div>
		<?php } ?> 
			
	</div><!-- header -->
	
	<div id="enjoy_dialog" style="display: none">
		<div class="dialog-header-bar"><div class="diglog-close-btn"></div></div>
			<div class="big-btn">
				<?php echo CHtml::image('images/drawingpin1_blue.png'); ?> 
<!-- 				<div><a id='enjoy_add_pin'>Add a pin</a></div> -->
				<div><?php echo CHtml::link('Add a pin', array('/pin_items/add')); ?></div>
			</div>
			<div class="big-btn">
				<?php echo CHtml::image('images/arrow_up-1.png'); ?>
				<div><?php echo CHtml::link('Upload a pin', array('/pin_items/add')); ?></div>
			</div>
			<div class="big-btn">
				<?php echo CHtml::image('images/bulletin_board.png'); ?>
				<div><?php echo CHtml::link('Create a board', array('/pin_items/add')); ?></div>
			</div>
	</div>
	
	<div class="content">
		<?php echo $content ?>
	</div>

	<div id="footer">
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
