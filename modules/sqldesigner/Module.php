<?php

namespace Simpletree\devui\modules\sqldesigner;


class Module extends \Simpletree\devui\components\Module
{
//	public $controllerNamespace = 'Simpletree\devui\modules\sqldesigner\controllers';

	public function init()
	{
		parent::init();

		// custom initialization code goes here
	}

	public static $moduleId = 'sqldesigner';

	public static $name = 'SQLDesigner';

	public static $icon = 'SQLDesigner';

	public static $category = 'database2';

	public static $description = 'database';
}
