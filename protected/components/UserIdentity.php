<?php
	class UserIdentity extends CUserIdentity {
		private $id;
		
		public function authenticate() {
			$record = User::model()->findByAttributes(array('email' => $this->email));
			
			if($record == null) {
				$this->errorCode = self::ERROR_USERNAME_INVLAID;
			}
			else  if($record->password != $this->password) {
				$this->errorCode = self::ERROR_PASSWORD_INVALID;
			}
			else {
				$this->id = $record->id;
				$this->setState('name', "$record->firstname $record->lastname");
				$this->errorCode = self::ERROR_NONE;
			}
			
			return !$this->errorCode;
		}
		
		public function getId() {
			return $this->id;
		}
		
	}
?>