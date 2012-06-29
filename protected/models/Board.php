<?php

/**
 * This is the model class for table "boards".
 *
 * The followings are the available columns in table 'boards':
 * @property string $id
 * @property string $title
 * @property integer $user_id
 * @property string $description
 * @property integer $category_id
 */
class Board extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Board the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'boards';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, user_id, category_id', 'required'),
			array('user_id, category_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>30),
			array('description', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('id, name, user_id, description, category_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'category'=>array(self::BELONGS_TO, 'Category', 'category_Id'),
			'user'=>array(self::BELONGS_TO, 'User', 'user_id'),
			'pinItems'=>array(self::HAS_MANY, 'PinItem', 'board_id'),
		);
	}
	
	public function attributeLabels() {
		return array(
			'title'=>Yii::t('app', 'model.board.title'),
			'category'=>Yii::t('app', 'model.board.category')
		);
	}
	
	public function getCoverImage() {
		$pin_img = array();
		$pins = PinItem::model()->findAll(array(
						'condition'=>'board_id=:bid', 
						'params'=>array(':bid'=>$this->id), 
						'limit'=>5
					));
		foreach($pins as $pin) {
			$pin_img[] = $pin->img_src;
		}
		return $pin_img;
	}

	public function beforeDelete() {
		$pinitems = PinItem::model()->findAll('board_id=:bid', array(':bid'=>$this->id));
		foreach($pinitems as $pinitem) {
			$pinitem->delete();
		}
		
		return parent::beforeDelete();
	}
}