<?php

class CategoryController extends CController
{
	public function actionAdd()
	{
		$newCategory = new Category;
		
		if(isset($_POST['Category'])) {
			$newCategory->attributes = $_POST['Category'];
			if($newCategory->save()) {
				$this->redirect(array('/'));
			}
		}
		$this->render('add', array(
			'category' => $newCategory
		));
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}