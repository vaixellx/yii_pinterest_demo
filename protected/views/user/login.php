<div class="white-container center shadow" style="width: 400px">
	<h1>Login :)</h1>
	
	<!-- flash message -->
	
	<?php  $form = $this->beginWidget('CActiveForm', array(
		'enableAjaxValidation' => true,
		'errorMessageCssClass' => 'error-message'
	)) ?>
	
	<?php echo $form->error($user, 'authenticate') ?>
	
	<div class='input'>
		<?php echo $form->labelEx($user, 'email') ?>
		<?php echo $form->textField($user, 'email') ?>
	</div>
	
	<div class='input'>
		<?php echo $form->labelEx($user, 'password') ?>
		<?php echo $form->passwordField($user, 'password') ?>
	</div>
	
	<div class='input'>
		<?php echo CHtml::submitButton('Login') ?>
	</div>
	
	<?php $this->endWidget() ?>
		
</div>