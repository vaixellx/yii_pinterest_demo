<?php
	class User extends CActiveRecord {
		
		public static function model($className=__CLASS__) {
			return parent::model($className);
		}
	
		public function tableName() {
			return 'users';
		}
	
		public function relation() {
			return array(
				'pinItems' => array(self::HAS_MANY, 'PinItem', 'user_id'),
				'comments' => array(self::HAS_MANY, 'Comment', 'user_id'),
				'boards' => array(self::HAS_MANY, 'Board', 'user_id'),
				'pinItemLikedUsers' => array(self::HAS_MANY, 'PinItemLikedUser', 'user_id'),
				'likedPinItems' => array(self::HAS_MANY, 'PinItem', array('pin_item_id' => 'id'), 'through' => 'pinItemLikedUsers')
			);
		}
	
		public function rules() {
			return array(
				array('email, password, firstname, lastname', 'required'),
				array('email', 'email')
			);
		} 
		
		public function attributeLabels() {
			return array(
				'email'=>Yii::t('app', 'model.user.email'),
				'password'=>Yii::t('app', 'model.user.password'),
				'firstname'=>Yii::t('app', 'model.user.firstname'),
				'lastname'=>Yii::t('app', 'model.user.lastname')				
			);
		}
	}
?>