<?php

namespace Simpletree\devui\modules\adminer;


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

	public $controllerNamespace = 'Simpletree\devui\modules\adminer\controllers';

	public function init()
	{
		parent::init();
		// custom initialization code goes here
	}

	public static $moduleId = 'adminer';

	public static $name = 'Adminer';

	public static $icon = 'PHPMyAdmin';

	public static $category = 'database';

	public static $description = 'database';
}
