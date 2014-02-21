<?php

namespace Simpletree\devui\modules\codeception;


use Symfony\Component\Yaml\Yaml;

/**
 * Class Module
 *
 * @package Simpletree\devui\modules\codeception
 * @property array $data
 */
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


	/**
	 * path to codeception.yml
	 * @var string
	 */
	public $path = '@app';

	/**
	 * Data loaded from codeception.yml
	 * @var array
	 */
	private $_data;

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
		$this->_data = Yaml::parse(file_get_contents($path));
	}

	public function getData()
	{
		return $this->_data;
	}
}
