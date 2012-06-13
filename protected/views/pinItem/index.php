<?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/wookmark.style.css') ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/pin_items/wookmark_style.js') ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/pin_items/like_button_handler.js') ?>

<!-- Pin items display -->
<div id='pinned-items-container'>
	<?php foreach ($pinItems as $item) { ?>
	    <div class='pin-items' pinItemId='<?php echo $item->id ?>'>
  		  
  		  <!-- Pin Action -->
		  <?php if(!Yii::app()->user->isGuest) { ?>
			  <div class='pin-action'>
			  	<a class='like-button'>Like</a>
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
	      	<span class='pin-like'><?php echo count($item->liked_users) ?> Likes</span>
	      	<span class='pin-comments-count'><?php echo count($item->comments) ?> Comments</span>
		  </div>
		</div>
	<?php } ?>  
	
	<!-- <div id='go_to_top'>
		Top
	</div> -->
</div>