<?php
	class PinItem extends CActiveRecord {
	
		public static function model($className=__CLASS__) {
			return parent::model($className);
		}
		
		public function tableName() {
			return 'pin_items';
		}
		
		public function like() {
			// Save liked user
			$pinItemLikedUser = new PinItemLikedUser;
			$pinItemLikedUser->pin_item_id = $this->id;
			$pinItemLikedUser->user_id = Yii::app()->user->id;
			$pinItemLikedUser->save();
			
			return count($this->liked_users);
		}
	
	}
?>