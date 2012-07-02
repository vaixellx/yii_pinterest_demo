<div class="white-container center shadow" style="width:400px; margin-top:30px;">
	
	<h1>Change Password</h1>
	
	<?php $form = $this->beginWidget('CActiveForm', array(
		'enableClientValidation' => true,
		'enableAjaxValidation' => true,
		'errorMessageCssClass' => 'error-message'	
	)) ?>
	
	<?php foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }?>
	
	<div class='input'>
		<?php echo $form->labelEx($user, 'old_password') ?>
		<?php echo $form->passwordField($user, 'old_password') ?>
		<?php echo $form->error($user, 'old_password') ?>
	</div>
	
	<div class='input'>
		<?php echo $form->labelEx($user, 'new_password') ?>
		<?php echo $form->passwordField($user, 'new_password') ?>
		<?php echo $form->error($user, 'new_password') ?>
	</div>
	
	<div class='input'>
		<?php echo $form->labelEx($user, 'confirm_password') ?>
		<?php echo $form->passwordField($user, 'confirm_password') ?>
		<?php echo $form->error($user, 'confirm_password') ?>
	</div>
	
	<div class='input'>
		<?php echo CHtml::submitButton('Save change') ?>
	</div>
	
	<?php $this->endWidget() ?>
</div>
