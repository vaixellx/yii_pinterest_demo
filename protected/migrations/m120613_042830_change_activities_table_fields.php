<?php

class m120613_042830_change_activities_table_fields extends CDbMigration
{
	public function up()
	{
		$this->renameColumn('activities', 'related_item_id', 'pin_item_id');
		$this->alterColumn('activities', 'pin_item_id', 'integer UNSIGNED');
		$this->alterColumn('activities', 'activity_type', 'text');
		$this->addColumn('activities', 'user_id', 'integer UNSIGNED NOT NULL');
		$this->addColumn('activities', 'board_id', 'integer UNSIGNED');
		$this->addColumn('activities', 'related_user_id', 'integer UNSIGNED');
		
	}

	public function down()
	{
		echo "m120613_042830_change_activities_table_fields does not support migration down.\n";
		$this->renameColumn('activities', 'pin_item_id', 'related_item_id');
		$this->dropColumn('activities', 'user_id');
		$this->dropColumn('activities', 'board_id');
		$this->dropColumn('activities', 'related_user_id');
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