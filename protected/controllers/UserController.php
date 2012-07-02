<?php

class UserController extends Controller
{
	public function actionLogin() {
		$user = new LoginForm;
		
		if(isset($_POST['LoginForm'])) {
			$user->attributes = $_POST['LoginForm'];
			
			if($user->validate()) {
				$user->login();
				$this->redirect(array('/'));
			}
		
		}

		$this->render('login',array(
			'user' => $user		
		));

	}
	
	public function actionLogout() {
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->user->returnUrl);
	}
	
	public function actionSignup() {
		$newUser = new User;
		
		if(isset($_POST['User'])) {
			$newUser->attributes = $_POST['User'];
			if($newUser->save()) {
				if($newUser->avartar_src !== null)
					$newUser->saveImage($newUser->id);
				$this->redirect(array('/'));
			}
		}
		
		$this->render('signup', array(
			'user' => $newUser
		));
	}
	
	public function actionProfile() {
	$user = User::model()->findByPk(Yii::app()->user->id);	
		if(isset($_POST['User'])) {
				
			if(!empty($_POST['User']['avartar_src']))
				$_POST['User']['avartar_src'] = $user->avartar_src;
				
			$user->setAttributes($_POST['User'], false);
			if($user->save()) {
				if(!empty($_POST['User']['avartar_src']))
					$user->saveImage();
				Yii::app()->user->setFlash('notice', 'Profile update successful.');
				$this->redirect(array('/'));
			}
		}
		
		$this->render('profile', array(
			'user' => $user
		));
	}
	
	public function actionChangePassword() {
		$user = User::model()->findByPk(Yii::app()->user->id);
	
		 if(isset($_POST['User']) && isset($_POST['User']['old_password'])) {
			 //if(isset($_POST['User']) )) {
			 if($_POST['User']['old_password']==$user->password) {
				 if($_POST['User']['confirm_password']!=$_POST['User']['new_password'])
					 Yii::app()->user->setFlash('error', 'Please fill confirm password again.');
				 else {
					 $user->password = $_POST['User']['new_password'];
					 $user->save();                                      
					 Yii::app()->user->setFlash('notice', 'Your new password has been updated.');
				 }
			 }
			 else
				 Yii::app()->user->setFlash('error', 'Your old password was entered incorrectly. Please enter it again.');
		 }

		$this->render('change_password', array(
			'user' => $user
		));
	}

}