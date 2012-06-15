<?php

class Comment extends Model{

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'comments';
	}


	public function rules() {
		return array(
			array('user_id, pin_item_id, message', 'required'),
			array('user_id, pin_item_id', 'numerical', 'integerOnly' => true),
		);
	}

	public function relations() {
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'pinItem' => array(self::BELONGS_TO, 'PinItem', 'pin_item_id')
		);
	}

	
}