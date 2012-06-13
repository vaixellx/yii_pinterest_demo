<div class='white-container center shadow' style='width:400px; margin-top:30px;'>
	
	<h1>New Pin Item</h1>	
	
	<?php $form = $this->beginWidget('CActiveForm', array(
		'enableClientValidation' => true,
		'errorMessageCssClass' => 'error-message'	
	)); ?>
	
	<div class='input'>
		<?php echo $form->labelEx($pinItem, 'img_src') ?>
		<?php echo $form->textField($pinItem, 'img_src') ?>
		<?php echo $form->error($pinItem, 'img_src') ?>
	</div>
	
	<div class='input'>
		<?php echo $form->labelEx($pinItem, 'description') ?>
		<?php echo $form->textArea($pinItem, 'description') ?>
		<?php echo $form->error($pinItem, 'description') ?>
	</div>
	
	<div class='input'>
		<?php echo CHtml::submitButton('Pin') ?>	
	</div>
	
	<?php $this->endWidget() ?>
	
</div>
