<?php

class PinItemController extends Controller
{
	public function actionAdd() {
		$newPinItem = new PinItem;
		$criteria = new CDbCriteria;
		$criteria->order = 'title ASC';
		$boards = Board::model()->findAll($criteria);
		
		if(isset($_POST['PinItem'])) {
			$newPinItem->attributes = $_POST['PinItem'];
			$newPinItem->user_id = Yii::app()->user->id;
						
			if($newPinItem->save()) {
				$this->redirect(array('/'));
			}
		}
		$this->render('add', array(
			'pinItem' => $newPinItem,
			'boards' => $boards
		));
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
			
			echo $pinItem->like(Yii::app()->user->id);
			
		}
	}

}