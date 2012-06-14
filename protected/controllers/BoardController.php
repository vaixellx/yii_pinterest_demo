<?php

class BoardController extends Controller
{
	public function actionAdd()
	{
		$newBoard = new Board;
		$criteria = new CDbCriteria;
		$criteria->order = 'title ASC';
		$categories = Category::model()->findAll($criteria);
		
		if(isset($_POST['Board'])) {
			$newBoard->attributes = $_POST['Board'];
			$newBoard->user_id = Yii::app()->user->id;
			
			if($newBoard->save()) {
				$this->redirect(array('/'));
			}	
		}
		$this->render('add', array(
			'board' => $newBoard,
			'categories' => $categories
		));
	}

	public function actionEdit()
	{
		$this->render('edit');
	}

	public function actionIndex()
	{
		$this->render('index');
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