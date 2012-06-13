<?php
	class PinItem extends CActiveRecord {
	
		public static function model($className=__CLASS__) {
			return parent::model($className);
		}
	
		public function tableName() {
			return 'pin_items';
		}
		
		public function relations() {
			return array(
				'user'=>array(self::BELONGS_TO, 'User', 'user_id'),
				'board'=>array(self::BELONGS_TO, 'Board', 'board_id'),
				'comments'=>array(self::HAS_MANY, 'Comment', 'pin_item_id'),
				'pin_item_liked_users'=>array(self::HAS_MANY, 'PinItemLikedUser', 'pin_item_id'),
				'liked_users'=>array(self::HAS_MANY, 'User', array('user_id'=>'id'), 'throght'=> 'pin_item_liked_users'),
				
			);
		}
	}
?>