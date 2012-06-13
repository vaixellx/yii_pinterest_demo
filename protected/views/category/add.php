<div class="white-container center shadow" style='width:400px; margin-top: 30px;'>
	<h1>New Category</h1>
	
	<?php $form = $this->beginWidget('CActiveForm', array(
		'enableAjaxValidation' => true,
		'errorMessageCssClass' => 'error-message'
	)); ?>
	
	<div class='input'>
		<?php echo $form->labelEx($category, 'title') ?>
		<?php echo $form->textField($category, 'title') ?>
		<?php echo $form->error($category, 'title') ?>
	</div>
	
	<div class='input'>
		<?php echo CHtml::submitButton('Create') ?>
	</div>
	
	<?php $this->endWidget() ?>
</div>
