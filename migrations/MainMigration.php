<?php

namespace Simpletree\devui\migrations;

use Simpletree\devui\models\App;
use Simpletree\devui\models\Project;
use Simpletree\devui\models\ProjectApp;
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
			'create_time' => 'int(11)',
			'update_time' => 'int(11)'
		]);

		//command_history
		$t = $this->prefix . 'command_history';
		$this->createTable($t, [
			'id' => 'pk',
			'id_project' => 'int',
			'id_app' => 'int',
			'command' => 'string',
			'name' => 'string',
			'favorite' => 'bool',
			'result' => 'text',
			'create_time' => 'int'
		]);
		$this->createIndex('create_time', $t, 'create_time');
		$this->createIndex('favorite', $t, 'favorite');

		//settings
		$t = $this->prefix . 'setting';
		$this->createTable($t, [
			'id' => 'pk',
			'project' => 'int',
			'app' => 'int',
			'key' => 'string(16)',
			'name' => 'string',
			'value' => 'string',
			'create_time' => 'int(11)',
			'update_time' => 'int(11)'
		]);
		$this->createIndex('key', $t, 'project,key');

		//bookmarks
		$t = $this->prefix . 'bookmark';
		$this->createTable($t, [
			'id' => 'pk',
			'id_app' => 'int',
			'url' => 'string',
			'name' => 'string',
			'default' => 'bool',
			'description' => 'string',
			'create_time' => 'int(11)',
			'update_time' => 'int(11)'
		]);

		//apps
		$t = $this->prefix . 'app';
		$this->createTable($t, [
			'id' => 'pk',
			'position' => 'int',
			'path' => 'string',
			'name' => 'string',
			'icon' => 'string',
			'actions' => 'string',
			'description' => 'string',
			'module_id' => 'string',
			'category' =>'string',
			'create_time' => 'int(11)',
			'update_time' => 'int(11)'
		]);

		//project apps
		$t = $this->prefix . 'project_app';
		$this->createTable($t, [
			'id' => 'pk',
			'id_project' => 'int NOT NULL',
			'id_app' => 'int NOT NULL',
			'actions' => 'string',
			'position' => 'int',
			'category' =>'string',
			'create_time' => 'int(11)',
			'update_time' => 'int(11)'
		]);

		$this->seed();
	}

	public function safeDown()
	{
		@$this->dropTable( $this->prefix . 'project' );
		@$this->dropTable( $this->prefix . 'command_history' );
		@$this->dropTable( $this->prefix . 'setting' );
		@$this->dropTable( $this->prefix . 'bookmark' );
		@$this->dropTable( $this->prefix . 'app' );
		@$this->dropTable( $this->prefix . 'project_app' );
	}

	public function seed()
	{
		//project
		$Project = new Project(['name' => 'Default']);
		$Project->save();

		//apps
		$apps = [
//			['position'=>1, 'path'=>'Simpletree\devui\modules\phpmyadmin\Module'],
//			['position'=>2, 'path'=>'Simpletree\devui\modules\chive\Module'],
			['position'=>3, 'path'=>'Simpletree\devui\modules\adminer\Module'],
			['position'=>4, 'path'=>'Simpletree\devui\modules\dbninja\Module'],
			['position'=>5, 'path'=>'Simpletree\devui\modules\sqldesigner\Module'],
			['position'=>6, 'path'=>'Simpletree\devui\modules\gii\Module'],
			['position'=>7, 'path'=>'Simpletree\devui\modules\codeception\Module']
		];

		foreach($apps as $k => $app){
			$App = new App($app);
			$App->recursiveValues = false;
			if(!$App->save()){
				print_r($App->errors); die($App->name . 'mainmigration dead');
			}

			$ProjectApp = new ProjectApp([
				'id_project' => $Project->id,
				'id_app' => $App->id
			]);
			$ProjectApp->save();
		}


	}
}
