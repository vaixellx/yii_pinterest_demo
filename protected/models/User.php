<?php
	class User extends Model {
		public $old_password;
		public $new_password;
		public $confirm_password;
		
		public static function model($className=__CLASS__) {
			return parent::model($className);
		}
	
		public function tableName() {
			return 'users';
		}
	
		public function relation() {
			return array(
				'pinItems' => array(self::HAS_MANY, 'PinItem', 'user_id'),
				'comments' => array(self::HAS_MANY, 'Comment', 'user_id'),
				'boards' => array(self::HAS_MANY, 'Board', 'user_id'),
				'pinItemLikedUsers' => array(self::HAS_MANY, 'PinItemLikedUser', 'user_id'),
				'likedPinItems' => array(self::HAS_MANY, 'PinItem', array('pin_item_id' => 'id'), 'through' => 'pinItemLikedUsers')
			);
		}
	
		public function rules() {
			return array(
				array('email, password, firstname, lastname, old_password, new_password, confirm_password', 'required'),
				array('email', 'email')
			);
		} 
		
		public function displayName() {
			return $this->firstname.' '.$this->lastname;
		}
		
		public function avartarPath() {
			return ($this->avartar_src == null) ? Yii::app()->request->baseUrl.'/images/default_avartar.png' : $this->avartar_src;
		}
		
		public function attributeLabels() {
			return array(
				'email'=>Yii::t('app', 'model.user.email'),
				'password'=>Yii::t('app', 'model.user.password'),
				'firstname'=>Yii::t('app', 'model.user.firstname'),
				'lastname'=>Yii::t('app', 'model.user.lastname')			
			);
		}
		
		public function saveImage() {
			$id = $this->id;
			//import extension
			Yii::import('application.extensions.upload.Upload');
			
			// Prepare file
			foreach($_FILES['User'] as $key => $value)
				$_FILES['User'][$key] = $value['avartar_src'];

			$Upload = new Upload((isset($_FILES['User']) ? $_FILES['User'] : null));
			$Upload->jpeg_quality = 100;
			$Upload->no_script    = false;
		    $Upload->image_resize = true;
		    $Upload->image_x      = 300;
		    $Upload->image_y      = 250;
		    $Upload->image_ratio  = true;
			
			$newName = date('YmdHis');
			
			$image_path = Yii::app()->getBasePath().'/../uploads/user'.$id.'/images/';
			$image_thumb_path = Yii::app()->getBasePath().'/../uploads/user'.$id.'/thumb/';
			$image_url = Yii::app()->request->baseUrl.'/uploads/user'.$id.'/images/';
			$image_thumb_url = Yii::app()->request->baseUrl.'/uploads/user'.$id.'/thumb/';
			$destName = '';
			
			//verify if was uploaded
			if($Upload->uploaded) {
				$Upload->file_new_name_body = $newName;
				$Upload->process($image_path);
				
				//if was processed
				if($Upload->processed) {
					$destName = $Upload->file_dst_name;
					$thumbDestName = 'thumb_'.$destName;
					$user = User::model()->findByPk($id);
					$user->avartar_src = $image_thumb_url.$thumbDestName;
					$user->save();
					
					//Create thumb size
					unset($Upload);
					$Upload = new Upload($image_path.$destName);
					$Upload->file_new_name_body = 'thumb_'.$newName;
					$Upload->no_script = false;
					$Upload->image_resize = true;
					$Upload->image_x = 85;
					$Upload->image_y = 50;
					$Upload->image_ratio = true;
					$Upload->process($image_thumb_path);
					Yii::app()->user->setState('avartar_path', $image_thumb_url.$thumbDestName);					
				} else {
					echo ($Upload->error);
				}
			} else {
				echo "Select an image to upload";
			}
			
		}
	}
?>