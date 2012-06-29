<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<script type="text/javascript">var baseUrl = '<?php echo Yii::app()->request->baseUrl ?>'</script>
	<?php $BASE_URL = Yii::app()->request->baseUrl ?>
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/style.css') ?>
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/custom.popup.css') ?>
	<?php //Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/custom.combobox.style.css') ?>
	
	<?php Yii::app()->clientScript->registerCoreScript('jquery') ?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/script.js') ?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.wookmark.min.js') ?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.dropelm.js') ?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.simplemodal.js') ?>
		
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::link(Yii::app()->params['siteName'], $BASE_URL) ?></div>
		
		<?php if(Yii::app()->user->isGuest) { ?>
			<div class="header-menu" id='login_button'><?php echo Yii::t('app', 'word.log_in') ?></div>
		<?php } else { ?>
			<div class='header-menu' id='profile_button' style='padding: 14px 5px;'> 
				<?php echo CHtml::image(Yii::app()->user->avartar_path, 'UserAvartar', array('class' => 'header-user-avartar')) ?>
				<div class='header-user-name'><?php echo Yii::app()->user->name ?><span class='header-user-arrow-down'></span></div>
			</div>
			<div class="header-menu" id="enjoy_btn">Enjoy+</div>
			
		<?php } ?> 
		<div class="header-menu"><?php echo Yii::t('app', 'word.about') ?></div>
		<div><?php $this->widget('ext.LanguagePicker.ELanguagePicker', array('id'=>'language_picker')); ?></div>
			
	</div><!-- header -->
	
	
	<div id="enjoy_dialog" style="display: none">
		<div class="dialog-header-bar">
			<div class="enjoy-text">Enjoy</div>
			<div class="dialog-close-btn"><?php echo CHtml::image($BASE_URL.'/images/gtk_close.png', '', array('width'=>50, 'height'=>50)); ?></div>
		</div>
			<div class="big-btn link-ct">
				<div class="dialog-icon"><?php echo CHtml::image($BASE_URL.'/images/drawingpin1_blue.png', '', array('width'=>50, 'height'=>50)); ?></div> 
				<div><?php echo CHtml::link('Add a pin', array('/pinItem/add')); ?></div>
			</div>
			<div class="big-btn link-ct">
				<div class="dialog-icon"><?php echo CHtml::image($BASE_URL.'/images/arrow_up-1.png', '', array('width'=>50, 'height'=>50)); ?></div>
				<div><?php echo CHtml::link('Upload a pin', array('/pinItem/add')); ?></div>
			</div>
			<div class="big-btn link-ct">
				<div class="dialog-icon"><?php echo CHtml::image($BASE_URL.'/images/bulletin_board.png', '', array('width'=>50, 'height'=>50)); ?></div>
				<div><?php echo CHtml::link('Create a board', array('/board/add')); ?></div>
			</div>
	</div>
	
	
	
	<div class="content">
		<?php echo $content ?>
	</div>

	<div id="footer">
	</div><!-- footer -->
	
	<?php if(Yii::app()->user->isGuest) { ?>
		<div id='login_form'>
						
			<? $user = new Loginform ?>
			<?php  $form = $this->beginWidget('CActiveForm', array(
				'action' => array('/user/login')
			)) ?>
			
			<?php echo $form->textField($user, 'email', array('placeholder' => 'email address')) ?>
		
			<?php echo $form->passwordField($user, 'password', array('placeholder' => 'password')) ?>
		
			<?php echo CHtml::submitButton(Yii::t('app', 'word.log_in')) ?>
			
			<?php $this->endWidget() ?>
	
		</div>
	<?php } else { ?>
		<div id='profile_panel'>
			<a class='disabled'><?php echo Yii::t('app', 'word.invite_friends') ?></a>
			<a class='disabled underline'><?php echo Yii::t('app', 'word.find_friends') ?></a>
			<a class='disabled'><?php echo Yii::t('app', 'word.boards') ?></a>
			<a class='disabled'><?php echo Yii::t('app', 'word.tips') ?></a>
			<a class='disabled'><?php echo Yii::t('app', 'word.enjoy') ?></a>
			<?php echo CHtml::link(Yii::t('app', 'word.profile'), array('/user/logout'), array('class' => 'underline')) ?>
			<?php echo CHtml::link(Yii::t('app', 'word.log_out'), array('/user/logout')) ?>
		</div>
	<?php } ?>
	
</div><!-- page -->

</body>
</html>
