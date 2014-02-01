<?php

namespace Simpletree\devui\modules\sqldesigner;


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

	public function init()
	{
		parent::init();

		// custom initialization code goes here
	}

	public static $moduleId = 'sqldesigner';

	public static $name = 'SQLDesigner';

	public static $icon = 'SQLDesigner';

	public static $category = 'database';

	public static $description = 'database';
}
