<?php

namespace Simpletree\devui\modules\codeception;


class Module extends \Simpletree\devui\components\Module
{
	public function behaviors()
	{
		return [
			'ModuleApp' => [
				'class' => '\Simpletree\devui\behaviors\ModuleApp'
			]
		];
	}

	public static $moduleId = 'codeception';

	public static $description = 'description';

	public static $name = 'Codeception';

	public static $icon = 'SQLDesigner';

	public static $category = 'Tests';

	public static $actions = [
		'Codeception Report' => ['default/report'],
		'Codeception Coverage' => ['default/coverage']
	];

	//path to codeception.yml
	public $path = '@app';

	//custom codeception.yml configuration
	public $config = [
		'tests' => 'tests',
		'log' => 'tests/_log',
		'data' => 'tests/_data',
		'helpers' => 'tests/_helpers'
	];

	//custom commands
	public $commands = [
		'functional' => 'php codecept.phar run functional --html',
		'acceptance' => 'php codecept.phar run acceptance --html'
	];


	public function init()
	{
		parent::init();
		//set alias
		\Yii::setAlias('codeception', $this->path);;

		$path =  \Yii::getAlias('@codeception/codeception.yml');


	}
}
