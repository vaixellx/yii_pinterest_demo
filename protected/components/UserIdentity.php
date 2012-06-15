<?php
	class UserIdentity extends CUserIdentity {
		private $id;
		
		public function authenticate() {
			$record = User::model()->findByAttributes(array('email' => $this->username));
// 			
			if($record == null) {
				return false;
			}
			else  if($record->password != $this->password) {
				return false;
			}
			else {
				$this->id = $record->id;
				$this->setState('name', $record->displayName());
				$this->setState('avartar_path', $record->avartarPath());
				return true;
			}
			
		}
		
		public function getId() {
			return $this->id;
		}
		
	}
?>