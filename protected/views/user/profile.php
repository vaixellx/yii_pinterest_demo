<div class="white-container center shadow" style='width:450px; margin-top: 30px;'>
	
	<h1>Profile</h1>
	
	<?php $form = $this->beginWidget('CActiveForm', array(
		'enableClientValidation' => true,
		'enableAjaxValidation' => true,
		'errorMessageCssClass' => 'error-message',
		'htmlOptions' => array('enctype'=>'multipart/form_data')
	)) ?>
	
	<?php foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }?>
	
	<div class='input'>
		<?php echo $form->labelEx($user, 'email') ?>
		<?php echo $form->textField($user, 'email') ?>
		<?php echo $form->error($user, 'email') ?>
	</div>
	
	<div class='input'>
		<?php echo $form->labelEx($user, 'password') ?>
	 	<?php echo CHtml::button('Change Password', array('submit'=>Yii::app()->request->baseUrl.'/user/changePassword')) ?>
	</div>
	
	<div class='input'>
		<?php echo $form->labelEx($user, 'firstname') ?>
		<?php echo $form->textField($user, 'firstname') ?>
		<?php echo $form->error($user, 'firstname') ?>
	</div>
	
	<div class='input'>	
		<?php echo $form->labelEx($user, 'lastname') ?>
		<?php echo $form->textField($user, 'lastname') ?>
		<?php echo $form->error($user, 'lastname') ?>
	</div>
	
	<div class='input'>
    	<?php echo $form->labelEx($user, 'avartar_src') ?>
    	<?php echo CHtml::image($user->avartar_src, 'UserAvartar', array('class'=>'avartar_frame shadow')) ?>
    	<?php echo $form->fileField($user, 'avartar_src') ?>
    	<?php echo $form->error($user, 'avartar_src') ?>
    </div>
	
	<div class='input'>
		<?php echo CHtml::submitButton('Update') ?>
	</div>
	
	<?php $this->endWidget() ?>
	
</div>
