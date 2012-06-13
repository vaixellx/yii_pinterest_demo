<<<<<<< HEAD
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/wookmark.style.css') ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/pin_items/wookmark_style.js') ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/pin_items/like_button_handler.js') ?>
=======
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/wookmark.style.css" media="screen, projection" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/pin_items/wookmark_style.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/pin_items/like_button_handler.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/pin_items/comment_button_handler.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/pin_items/floated_element.js"></script>


<!-- Pin new items -->
<div style='height:35px'>
	<?php //echo $this->Flash->allMessage() ?>
	<?php echo CHtml::link('Pin new items', 'add', array('class' => 'button', 'style' => 'float:right', 'iconPrimary' => 'ui-icon-pin-s')) ?>
</div>
<hr/>
>>>>>>> e1e636c12919d76bed4f004c2fa7c0540d66000e

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