<div class='white-container center shadow' style='width: 400px; margin-top: 30px'>
	
	<h1>Sign up</h1>
	
	<!-- create form -->
	<?php $form = $this->beginWidget('CActiveForm', array(
			'enableAjaxValidation' => true,
			'errorMessageCssClass' => 'error-message'
	)); ?>
    
    <!-- email -->
    <div class='input'>
    	<?php echo $form->labelEx($user, 'email') ?>
    	<?php echo $form->textField($user, 'email') ?>
    	<?php echo $form->error($user, 'email') ?>
    </div>
    
    <!-- password -->
    <div class='input'>
    	<?php echo $form->labelEx($user, 'password') ?>
    	<?php echo $form->passwordField($user, 'password') ?>
    	<?php echo $form->error($user, 'password') ?>
    </div>
    
    <!-- firstname -->
    <div class='input'>
    	<?php echo $form->labelEx($user, 'firstname') ?>
    	<?php echo $form->textField($user, 'firstname') ?>
    	<?php echo $form->error($user, 'firstname') ?>
    </div>
    
    <!-- lastname -->
    <div class='input'>
    	<?php echo $form->labelEx($user, 'lastname') ?>
    	<?php echo $form->textField($user, 'lastname') ?>
    	<?php echo $form->error($user, 'lastname') ?>
    </div>
    
    <div class='input'>
    	<?php echo CHtml::submitButton('Signup') ?>
	</div>
	
	<?php $this->endWidget() ?>
    
</div>