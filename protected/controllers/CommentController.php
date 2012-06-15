<?php

	class CommentController extends CController {
		
		public function actionAdd() {
			if(isset($_POST['Comment'])) {
				$comment = new Comment;
				$comment->pin_item_id = $_POST['Comment']['pin_item_id'];
				$comment->message = $_POST['Comment']['message'];
				$comment->user_id = Yii::app()->user->id;
				
				if($comment->save())
					$this->renderPartial('//pinItem/_pin_comment', array('comment' => $comment), false, false);
			}
		}

	}
	
?>