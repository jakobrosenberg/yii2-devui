<?php

namespace Simpletree\devui\modules\gii;

use Yii;

class Module extends \yii\gii\Module
{
	public static $moduleId = 'gii';

	public static $name = 'Gii';

	public static $icon = 'SQLDesigner';

	public static $category = null;

	public static $description = 'database';

	public static $actions = [];

	public $allowedIPs = ['*'];

	public function __construct($id, $parent = null, $config = [])
	{
		$this->setBasePath('@yii/gii');
		parent::__construct($id, $parent, $config);
	}

	public function init()
	{
		$this->setLayoutPath('@Simpletree/devui/modules/gii/views/layouts');
		parent::init();
	}
}
