<div class='pin-comment'>
			  	
	<!-- Comment Owner avatar -->
	<?php echo CHtml::image($comment->user->avartarPath(), 'UserAvartar', array('class' => 'pin-owner-avatar')) ?>
	
	<!-- Comment -->
	<div class='pin-comment-text'>
		<!-- Comment Owner-->
		<span class='pin-comment-owner bold'><?php echo $comment->user->displayName()?></span>
	  	<!-- Comment Message -->
		<span class='pin-comment-message'><?php echo $comment->message ?></span>
	</div>
  	
</div>