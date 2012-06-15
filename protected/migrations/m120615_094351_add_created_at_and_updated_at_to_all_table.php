<?php

class m120615_094351_add_created_at_and_updated_at_to_all_table extends CDbMigration
{
	public function up()
	{
		$this->addColumn('activities', 'created_at', 'timestamp NOT NULL');
		$this->addColumn('activities', 'updated_at', 'timestamp NOT NULL');
		$this->addColumn('boards', 'created_at', 'timestamp NOT NULL');
		$this->addColumn('boards', 'updated_at', 'timestamp NOT NULL');
		$this->addColumn('categories', 'created_at', 'timestamp NOT NULL');
		$this->addColumn('categories', 'updated_at', 'timestamp NOT NULL');
		$this->addColumn('comments', 'updated_at', 'timestamp NOT NULL');
		$this->addColumn('pin_item_liked_users', 'created_at', 'timestamp NOT NULL');
		$this->addColumn('pin_item_liked_users', 'updated_at', 'timestamp NOT NULL');
		$this->addColumn('pin_items', 'created_at', 'timestamp NOT NULL');
		$this->addColumn('pin_items', 'updated_at', 'timestamp NOT NULL');
		$this->addColumn('users', 'created_at', 'timestamp NOT NULL');
		$this->addColumn('users', 'updated_at', 'timestamp NOT NULL');
		
	}

	public function down()
	{
		$this->dropColumn('activities', 'created_at');
		$this->dropColumn('activities', 'updated_at');
		$this->dropColumn('boards', 'created_at');
		$this->dropColumn('boards', 'updated_at');
		$this->dropColumn('categories', 'created_at');
		$this->dropColumn('categories', 'updated_at');
		$this->dropColumn('comments', 'updated_at');
		$this->dropColumn('pin_item_liked_users', 'created_at');
		$this->dropColumn('pin_item_liked_users', 'updated_at');
		$this->dropColumn('pin_items', 'created_at');
		$this->dropColumn('pin_items', 'updated_at');
		$this->dropColumn('users', 'created_at');
		$this->dropColumn('users', 'updated_at');
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