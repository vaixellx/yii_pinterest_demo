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

<!-- Pin items display -->
<div id='pinned-items-container'>
	<?php foreach ($pinItems as $item) { ?>
	    <div class='pin-items' pinItemId='<?php echo $item->id ?>'>
  		  
	      <!--Pinned Image-->
	      <div class='pin-images-container' style='min-height: <?php echo 230 * $item->height / $item->width ?>px'>
	      	<a href='<?php echo $item->img_src ?>'>
	        	<img src='<?php echo $item->img_src ?>' class='pin-images'>
			</a>      
	      </div>
	
	      <!-- Description -->
	      <div class='pin-description' style="line-height: 16px">
	        <span class='pin-description-body'><?php echo $item->description ?></span>
	      </div>
	      
	      <!-- Like & Comments count -->
	      <div class='pin-like-and-comment'>
	      	<span class='pin-like'><?php //echo count($item['PinItemLikedUser']) ?> Likes</span>
	      	<span class='pin-comments-count'><?php //echo count($item['Comment']) ?> Comments</span>
		  </div>
		</div>
	<?php } ?>  
	
	<div id='go_to_top'>
		Top
	</div>
</div>