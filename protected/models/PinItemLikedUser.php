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
			);
		}
	
		public function relations() {
			return array(
				'pinItem' => array(self::BELONGS_TO, 'PinItem', 'pin_item_id'),
				'user' => array(self::BELONGS_TO, 'User', 'user_id')
			);
		}
	
	}

?>