<?php $this->widget('application.components.widgets.MainMenuWidget'); ?>
<div class="center" style="margin: 15px;">
	<?php foreach($boards as $board): ?>
		<div class="user-board">
			<div class="user-board-header"><?php echo $board->title; ?></div>
			<div class="user-board-count">
				<span style="float: left"><?php echo CHtml::link('Edit', array('edit', 'id'=>$board->id)); ?></span>
				<span style="float: right"><?php echo count($board->pinItems); ?> Items</span>
			</div>
			<?php echo CHtml::link('', array('/pinitem/board', 'id'=>$board->id), array('class'=>'board-link')); ?>
			<div class="user-board-cover"><?php $pin_img = $board->getCoverImage(); echo CHtml::Image(@$pin_img[0]); ?></div>
			<div class="user-board-small">
				<?php for($i=1; $i<sizeof($pin_img); $i++): ?><span class="user-board-smallpic"><?php echo CHtml::Image($pin_img[$i]); ?></span><?php endfor; ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>