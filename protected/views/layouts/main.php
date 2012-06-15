<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<script type="text/javascript">var baseUrl = '<?php echo Yii::app()->request->baseUrl ?>'</script>
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/style.css') ?>
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/custom.popup.css') ?>
	<?php Yii::app()->clientScript->registerCoreScript('jquery') ?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/script.js') ?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.wookmark.min.js') ?>
	

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
			<div class='header-user-information'> 
				<?php echo CHtml::image(Yii::app()->user->avartar_path, 'UserAvartar', array('class' => 'header-user-avartar')) ?>
				<div class='header-user-name'><?php echo Yii::app()->user->name ?></div>
			</div>
		<?php } ?> 
			
	</div><!-- header -->
	
	<div id="enjoy_dialog" style="display: none">
		<div class="dialog-header-bar">
			<div class="enjoy-text">Enjoy</div>
			<div class="dialog-close-btn"><?php echo CHtml::image('images/gtk_close.png', '', array('width'=>50, 'height'=>50)); ?></div>
		</div>
			<div class="big-btn link-ct">
				<div class="dialog-icon"><?php echo CHtml::image('images/drawingpin1_blue.png', '', array('width'=>50, 'height'=>50)); ?></div> 
				<div><?php echo CHtml::link('Add a pin', array('/pinItem/add')); ?></div>
			</div>
			<div class="big-btn link-ct">
				<div class="dialog-icon"><?php echo CHtml::image('images/arrow_up-1.png', '', array('width'=>50, 'height'=>50)); ?></div>
				<div><?php echo CHtml::link('Upload a pin', array('/pinItem/add')); ?></div>
			</div>
			<div class="big-btn link-ct">
				<div class="dialog-icon"><?php echo CHtml::image('images/bulletin_board.png', '', array('width'=>50, 'height'=>50)); ?></div>
				<div><?php echo CHtml::link('Create a board', array('/board/add')); ?></div>
			</div>
	</div>
	
	<div class="content">
		<?php echo $content ?>
	</div>

	<div id="footer">
	</div><!-- footer -->
	
	<div id='modal_layer'></div>

</div><!-- page -->

</body>
</html>
