<?php
/**
 * Created by Jakob
 * Date: 29-11-13
 * Time: 10:11
 */

namespace Simpletree\devui;


use yii\web\AssetBundle;

class DevuiAsset extends AssetBundle{

	public $sourcePath = '@Simpletree/devui/assets/main';

	public $css = ['css/main.css', 'css/toggle-switch.css'];


	public $publishOptions = ['forceCopy' => true];

	public $depends = ['yii\bootstrap\BootstrapAsset'];

	public function getLoaderUrl()
	{
		return 'test';
	}

} 