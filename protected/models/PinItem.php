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
				'liked_users'=>array(self::HAS_MANY, 'User', array('user_id'=>'id'), 'through'=> 'pin_item_liked_users'),
				
			);
		}
		
		public function rules() {
			return array(
				array('img_src, user_id', 'required'),
				array('user_id, width, height', 'numerical'),
				array('img_src', 'url')
			);
		}
		
		public function beforeSave() {
			if ($this->isNewRecord) {
				list($this->width, $this->height) = getimagesize($this->img_src);
			}
			
			return true;
		} 
		
	}
?>