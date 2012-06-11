<?php

class UserController extends CController
{
	public function actionLogin() {
		$user = new LoginForm;
		
		if(isset($_POST['LoginForm'])) {
			$user->attributes = $_POST['LoginForm'];
			
			if($user->validate()) {
				$this->redirect(array('/'));
			}
		
		}

		$this->render('login',array(
			'user' => $user		
		));

	}
	
	public function actionSignup() {
		$newUser = new User;
		
		if(isset($_POST['User'])) {
			$newUser->attributes = $_POST['User'];
			if($newUser->save()) {
				$this->redirect(array('/'));
			}
		}
		
		$this->render('signup', array(
			'user' => $newUser
		));
	}

}