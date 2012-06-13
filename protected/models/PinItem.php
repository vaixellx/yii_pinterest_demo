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
				'pinItemLikedUsers'=>array(self::HAS_MANY, 'PinItemLikedUser', 'pin_item_id'),
				'likedUsers'=>array(self::HAS_MANY, 'User', array('user_id'=>'id'), 'through'=> 'pinItemLikedUsers'),
			);
		}
		
		public function like($userId) {
			$pinItemLikedUser = new PinItemLikedUser;
			$pinItemLikedUser->pin_item_id = $this->id;
			$pinItemLikedUser->user_id = $userId;
			$pinItemLikedUser->save();
			
			return count($this->likedUsers);
		}
		
		public function isLiked($userId) {
			foreach($this->likedUsers as $likedUser) {
				if($likedUser->id == $userId)
					return true;
			}			
			
			return false;
		}
	}
?>