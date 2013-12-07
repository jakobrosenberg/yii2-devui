<?php

namespace Simpletree\devui\migrations;

use yii\db\Schema;

class MainMigration extends \yii\db\Migration
{
	public $prefix = 'devui_';

	public function safeUp()
	{
		//project
		$t = $this->prefix . 'project';
		$this->createTable($t, [
			'id' => 'pk',
			'name' => 'string NOT NULL',
			'description' => 'string',
		]);

		//command_history
		$t = $this->prefix . 'command_history';
		$this->createTable($t, [
			'id' => 'pk',
			'project_id' => 'int',
			'command' => 'string',
			'time' => 'int',
			'favorite' => 'bool',
			'result' => 'text'
		]);
		$this->createIndex('time', $t, 'time');
		$this->createIndex('favorite', $t, 'favorite');

		//settings
		$t = $this->prefix . 'settings';
		$this->createTable($t, [
			'id' => 'pk',
			'project' => 'int',
			'key' => 'string(16)',
			'name' => 'string',
			'value' => 'string',
			'time' => 'int(11)'
		]);
		$this->createIndex('key', $t, 'project,key');

	}

	public function safeDown()
	{
		@$this->dropTable($this->prefix . 'project');
		@$this->dropTable($this->prefix . 'command_history');
		@$this->dropTable($this->prefix . 'settings');
	}
}
