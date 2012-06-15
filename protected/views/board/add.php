<div class="white-container center shadow" style='width:400px; margin-top: 30px;'>
	<h1>New Board</h1>
	
	<?php $form = $this->beginWidget('CActiveForm', array(
		'enableClientValidation' => true,
		'errorMessageCssClass' => 'error-message'
	)); ?>
	
	<div class='input'>
		<?php echo $form->labelEx($board, 'title') ?>
		<?php echo $form->textField($board, 'title') ?>
		<?php echo $form->error($board, 'title') ?>
	</div>
	
	<div class='input'>
		<?php echo $form->labelEx($board, 'description') ?>
		<?php echo $form->textArea($board, 'description') ?>
		<?php echo $form->error($board, 'description') ?>
	</div>
	
	<div class='input'>
		<?php echo $form->labelEx($board, 'category') ?>
		<?php echo $form->dropDownList($board, 'category_id', CHtml::listData($categories, 'id', 'title'), array('prompt'=>'Select category')) ?>
		<?php echo $form->error($board, 'category_id') ?>
	</div>
	
	<div class='input'>
		<?php echo CHtml::submitButton('Create') ?>
	</div>
	
	<?php $this->endWidget() ?>
</div>
