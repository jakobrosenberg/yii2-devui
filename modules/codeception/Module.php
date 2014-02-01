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

	//default codeception.yml configuration
	protected $_config = [
		'tests' => 'tests',
		'log' => 'tests/_log',
		'data' => 'tests/_data',
		'helpers' => 'tests/_helpers'
	];

	//custom codeception.yml configuration
	public $config = [];

	//custom commands
	public $commands = [
		'functional' => 'php codecept.phar run functional --html',
		'acceptance' => 'php codecept.phar run acceptance --html'
	];


	public function init()
	{
		parent::init();

		$this->config = array_merge($this->_config, $this->config);
		//set alias
		\Yii::setAlias('codeceptionLog', $this->getRealPathFor('log'));



	}



	/**
	 * Returns the real path of a $config item
	 * @param $path
	 * @return string
	 */
	public function getRealPathFor($path)
	{
		$path = $this->config[$path];
		if(substr($path, 0, 1) !== '/')		{
			$path = \Yii::getAlias($this->path . '/' . $path);
		}
		return $path;
	}


}
