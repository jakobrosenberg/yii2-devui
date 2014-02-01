<?php

namespace Simpletree\devui\modules\dbninja;


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

	public $controllerNamespace = 'Simpletree\devui\modules\dbninja\controllers';

	public function init()
	{
		parent::init();

		// custom initialization code goes here
	}

	public static $moduleId = 'dbninja';

	public static $name = 'DBNinja';

	public static $icon = 'db';

	public static $category = 'database';

	public static $description = 'database';
}
