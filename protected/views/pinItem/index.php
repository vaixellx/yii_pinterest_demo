<?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/wookmark.style.css') ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/pin_items/wookmark_style.js') ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/pin_items/action_handler.js') ?>


<!-- Pin items display -->
<div id='pinned-items-container'>
	<?php foreach ($pinItems as $item) { ?>
	    <div class='pin-items' pinItemId='<?php echo $item->id ?>'>
  		  
  		  <!-- Pin Action -->
		  <?php if(!Yii::app()->user->isGuest) { ?>
			  <div class='pin-action'>
			  	<a class='<?php echo ($item->isLiked(Yii::app()->user->id) ? 'disabled-button' : 'like-button') ?>'>Like</a>
	  			<a class='comment-button'>Add Comment</a>
	  		  </div>
  		  <?php } ?>
  		  
	      <!--Pinned Image-->
	      <div class='pin-images-container' style='min-height: <?php echo 230 * $item->height / $item->width ?>px'>
 		 	<img src='<?php echo $item->img_src ?>' class='pin-images'>    
	      </div>
	
	      <!-- Description -->
	      <div class='pin-description' style="line-height: 16px">
	        <span class='pin-description-body'><?php echo $item->description ?></span>
	      </div>
	      
	      <!-- Like & Comments count -->
	      <div class='pin-like-and-comment'>
	      	<span class='pin-like'><?php echo count($item->likedUsers) ?> Likes</span>
	      	<span class='pin-comments-count'><?php echo count($item->comments) ?> Comments</span>
		  </div>
		  
		  <!-- Comment -->
		  <div class='pin-comment-ct'>			  
			  <?php foreach($item->comments as $comment) { ?>
				  <?php $this->renderPartial('_pin_comment', array('comment' => $comment)) ?>
			  <?php } ?>
		  </div>
		  
		  <!-- New comment-->
		  <?php if(!Yii::app()->user->isGuest) { ?>
			  <!-- New comment box -->
			  <div class='pin-comment hidden new-comment'>
				  	
			  	<!-- Comment Owner avatar -->
		  		<?php echo CHtml::image(Yii::app()->user->avartar_path, 'UserAvartar', array('class' => 'pin-owner-avatar')) ?>
			  	
			  	<!-- Comment -->
			  	<div class='pin-comment-text'>
					<textarea class='pin-new-comment-message' placeholder='Write your commet here.'></textarea>			  		
			  	</div>
			  	
			  	<div class='pin-post-comment'>
			  		<a class='submit-new-comment-button'>comment</a>
			  	</div>
			  </div>
		  <?php } ?>
		</div>

	<?php } ?>  
	
	<!-- <div id='go_to_top'>
		Top
	</div> -->
</div>