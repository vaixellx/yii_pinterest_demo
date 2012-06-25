<?php
class MainMenuWidget extends CWidget
{
	public function run()
	{
		$categories = Category::model()->findAll();
		$this->render('_main_menu_toolbar', array(
			'categories' => $categories
		));
	}
}
