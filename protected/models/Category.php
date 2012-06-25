<?php

/**
 * This is the model class for table "categories".
 *
 * The followings are the available columns in table 'categories':
 * @property string $id
 * @property string $name
 */
class Category extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Category the static model class
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
		return 'categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('title', 'length', 'max'=>30),
			array('title', 'unique')
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('id, name', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'boards'=>array(self::HAS_MANY, 'Board', 'category_id'),
			'pinItems'=>array(self::HAS_MANY, 'PinItem', array('id'=>'board_id'), 'through'=>'boards')
		);
	}
	
	public function attributeLabels() {
		return array(
			'title'=>Yii::t('app', 'model.category.title')
		);
	}
	

}