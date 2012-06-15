<?php

	class Model extends CActiveRecord{
	
		// public static function model($className=__CLASS__) {
			// return parent::model($className);
		// }
// 	
		// // public function tableName() {
			// // return 'comments';
		// // }
// 	
		public function beforeSave() {
		    if ($this->isNewRecord)
		        $this->created_at = new CDbExpression('NOW()');
		    $this->updated_at = new CDbExpression('NOW()');
		 
		    return parent::beforeSave();
		}
	}
?>