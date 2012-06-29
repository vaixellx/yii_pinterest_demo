<?php $this->widget('application.components.widgets.MainMenuWidget'); ?>
<div class="center" style="margin: 15px;">
	<?php foreach($boards as $board): ?>
		<div class="user-board">
			<div class="user-board-header">
				<?php echo CHtml::link($board->title, array('/pinitem/board', 'id'=>$board->id)) ?>
			</div>
			<div class="user-board-count">
				<span style="float: left"><?php echo CHtml::link('Edit', array('edit', 'id'=>$board->id)); ?></span>
				<span style="float: right"><?php echo count($board->pinItems); ?> Items</span>
			</div>
			<div class='link-ct'>
				<?php echo CHtml::link('', array('/pinitem/board', 'id'=>$board->id), array('class'=>'board-link')); ?>
				<div class="user-board-cover"><?php $pin_img = $board->getCoverImage(); echo CHtml::Image(@$pin_img[0]); ?></div>
				<div class="user-board-small">
					<?php for($i=1 ; $i <= 4; $i++) { ?>
						<span class="user-board-smallpic<?php echo ($i == 4) ? '-last' : '' ?>">
							<?php if($i <= count($pin_img) - 1) { ?>
								<?php echo CHtml::Image($pin_img[$i]) ?> 
							<?php } ?>
						</span>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>