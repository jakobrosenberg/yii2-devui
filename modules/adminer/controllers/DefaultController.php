<?php

namespace Simpletree\devui\modules\adminer\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
	public function actionIndex()
	{
		return $this->render('/default', [
			'assetClass' => 'Simpletree\devui\modules\adminer\Asset',
			'iframeOptions' => [
				'height' => 'window',
				'interval' => 'false'
			],
		]);
	}
}
