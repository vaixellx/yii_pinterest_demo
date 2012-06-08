<?php

class m120606_123007_create_all_database_table extends CDbMigration
{
	public function up()
	{
		//Create 'activities'
		$this->createTable('activities', array(
			'id' => 'pk',
			'activity_type' => 'integer UNSIGNED NOT NULL',
			'related_item_id' => 'integer UNSIGNED NOT NULL'
		));
		
		//Create 'boards'
		$this->createTable('boards', array(
			'id' => 'pk',
			'title' => 'string NOT NULL',
			'user_id' => 'integer UNSIGNED NOT NULL',
			'description' => 'string',
			'category_id' => 'integer UNSIGNED NOT NULL'
		));
		
		//Create 'categories'
		$this->createTable('categories', array(
			'id' => 'pk',
			'title' => 'string NOT NULL'
		));
		
		//Create 'comments'
		$this->createTable('comments', array(
			'id' => 'pk',
			'user_id' => 'integer UNSIGNED NOT NULL',
			'pin_item_id' => 'integer UNSIGNED NOT NULL',
			'message' => 'text NOT NULL',
			'created_at' => 'timestamp NOT NULL'
		));
		
		//Create 'pin_item_liked_users'
		$this->createTable('pin_item_liked_users', array(
			'id' => 'pk',
			'user_id' => 'integer UNSIGNED NOT NULL',
			'pin_item_id' => 'integer UNSIGNED NOT NULL'
		));
		
		//Create 'pin_items'
		$this->createTable('pin_items', array(
			'id' => 'pk',
			'user_id' => 'integer UNSIGNED NOT NULL',
			'img_src' => 'string NOT NULL',
			'description' => 'text',
			'width' => 'integer UNSIGNED NOT NULL',
			'height' => 'integer UNSIGNED NOT NULL',
			'board_id' => 'integer UNSIGNED NOT NULL'
		)); 

		//Create 'users'
		$this->createTable('users', array(
			'id' => 'pk',
			'email' => 'string NOT NULL',
			'password' => 'string NOT NULL',
			'firstname' => 'string NOT NULL',
			'lastname' => 'string NOT NULL',
			'avartar_src' => 'string'
		));
	}

	public function down()
	{
		$this->dropTable('activities');
		$this->dropTable('boards');
		$this->dropTable('categories');
		$this->dropTable('comments');
		$this->dropTable('pin_item_liked_users');
		$this->dropTable('pin_items');
		$this->dropTable('users');	
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}