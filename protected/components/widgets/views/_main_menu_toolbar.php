<?php if(!Yii::app()->user->isGuest) { ?>
<ul id="main_menu_toolbar">
	<li><?php echo CHtml::link(Yii::t('app', 'word.myvip'), array('/user/logout')) ?></li>
	<li><a><?php echo Yii::t('app', 'word.shopping') ?></a></li>
	<li><?php echo CHtml::link(Yii::t('app', 'word.the_top'), array('/user/logout')) ?></li>
	<li><a><?php echo Yii::t('app', 'word.categories') ?></a>
		<ul>
			<?php foreach($categories as $category) {?>
			<div><li><?php echo CHtml::link($category->title, array("/pinItem/category/$category->id")); ?></li></div>
			<?php } ?>
		</ul>
	</li>
	<li><?php echo CHtml::link(Yii::t('app', 'word.they_inspire_you'), array('/user/logout')) ?></li>	
</ul>
<?php } ?>
