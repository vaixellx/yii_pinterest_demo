<?php

class PinItemController extends CController
{
	public function actionAdd() {
		$newPinItem = new PinItem;
		
		if(isset($_POST['PinItem'])) {
			$newPinItem->attributes = $_POST['PinItem'];
			$newPinItem->user_id = Yii::app()->user->id;
						
			if($newPinItem->save()) {
				$this->redirect(array('/'));
			}
		}
		$this->render('add', array(
			'pinItem' => $newPinItem
		));
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