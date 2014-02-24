<?php
/**
 * Created by Jakob
 * Date: 29-11-13
 * Time: 10:11
 */

namespace Simpletree\devui;


use yii\web\AssetBundle;
use yii\web\View;

class DevuiAsset extends AssetBundle{

	public $sourcePath = '@Simpletree/devui/assets/main';

	public $css = ['css/main.css', 'css/toggle-switch.css'];

	public $js = [
		'scripts/vendor/angular.min.js',
		'scripts/services.js',
		'scripts/app.js',
		'scripts/vendor/angular-resource.min.js',
		'scripts/vendor/angular-route.min.js',
		'scripts/controllers.js',
	];

	public $jsOptions = ['position' => View::POS_HEAD];

	public $publishOptions = ['forceCopy' => true];

	public $depends = ['yii\bootstrap\BootstrapAsset'];

	public function getLoaderUrl()
	{
		return 'test';
	}

} 