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

	public function actionLike() {
		if(isset($_POST['liked_pin_item_id'])) {
			$pinItemId = $_POST['liked_pin_item_id'];
			$pinItem = PinItem::model()->findByPk($pinItemId);
			$pinItem->like();
			
			echo count($pinItem->liked_users);
			
		}
	}

}