<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $email;
	public $password;

	private $identity;

	public function rules() {
		return array(
			array('email, password', 'required'),
			array(array('password') ,'authenticate')
		);
	}

	public function authenticate($attributes, $params) {
		$this->identity = new UserIdentity($this->email, $this->password);
		
		if(!$this->identity->authenticate()) {
			$this->addError('authenticate', 'Email or password was invalid');
		}
	}
	
	public function login() {
		if($this->identity == null)
			$this->identity = new UserIdentity($this->email, $this->password);
		
		Yii::app()->user->login($this->identity);
	}
}
