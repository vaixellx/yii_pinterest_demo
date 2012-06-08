<?php

class PinItemController extends CController
{
	public function actionAdd() {
		$this->render('add');
	}

	public function actionIndex() {
		$pinItems = PinItem::model()->findAll();
		$this->render('index', array(
			'pinItems' => $pinItems
		));
	}

	public function actionLike($like) {
		echo "Like is $like";
	}

}