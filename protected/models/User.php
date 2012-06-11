<?php
	class User extends CActiveRecord {
		
		public function rules() {
			return array(
				array(array('email', 'password', 'firstname', 'lastname'), 'required'),
				array('email', 'email')
			);
		}
	
		public static function model($className=__CLASS__) {
			return parent::model($className);
		}
	
		public function tableName() {
			return 'users';
		}
	 
	}
?>