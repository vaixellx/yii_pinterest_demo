<?php

	class PinItemLikedUser extends CActiveRecord {
	
		public static function model($className=__CLASS__) {
			return parent::model($className);
		}
	 
		public function tableName() {
			return 'pin_item_liked_users';
		}
	
		public function rules() {
			return array(
				array('user_id, pin_item_id', 'required'),
				array('user_id, pin_item_id', 'numerical', 'integerOnly'=>true),
				array('user_id, pin_item_id', 'uniqueLiked'),
			);
		}
	
		public function relations() {
			return array(
				'pinItem' => array(self::BELONGS_TO, 'PinItem', 'pin_item_id'),
				'user' => array(self::BELONGS_TO, 'User', 'user_id')
			);
		}
		
		public function uniqueLiked($attributes, $params) {
			$record = self::model()->findByAttributes(array('pin_item_id' => $this->pin_item_id, 'user_id' => $this->user_id));
			
			if($record != null) {
				$this->addError('uniqLiked', 'This user was already liked this item.');
			}
		}
	
	}

?>