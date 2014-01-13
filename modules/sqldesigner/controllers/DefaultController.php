<?php

namespace Simpletree\devui\modules\sqldesigner\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
	public function actionIndex()
	{
		return $this->render('@Simpletree/devui/views/iframe/asset', [
			'assetClass' => 'Simpletree\devui\modules\sqldesigner\Asset',
//			'scriptFile' => 'index.php',
			'iframeOptions' => [
				'height' => 'window',
				'interval' => 'false'
			]
		]);
	}
}
