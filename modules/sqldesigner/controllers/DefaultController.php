<?php

namespace Simpletree\devui\modules\sqldesigner\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
	public function actionIndex()
	{
		return $this->render('/default', [
			'assetClass' => 'Simpletree\devui\modules\sqldesigner\Asset',
			'iframeOptions' => [
				'height' => 'window',
				'interval' => 'false'
			]
		]);
	}
}
