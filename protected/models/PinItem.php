<?php
	class PinItem extends Model {
	
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
		
		public function rules() {
			return array(
				array('img_src, user_id, board_id', 'required'),
				array('user_id, board_id, width, height', 'numerical'),
				array('img_src', 'url')
			);
		}
		
		public function attributeLabels() {
		    return array(
		        'img_src'=>Yii::t('app','model.pin_item.img_src'),
		        'description'=>Yii::t('app', 'model.pin_item.description')
		    );
		}
		
		public function beforeSave() {
			list($this->width, $this->height) = getimagesize($this->img_src);
			return parent::beforeSave();
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