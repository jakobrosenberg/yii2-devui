<?php

namespace Simpletree\devui\modules\dbninja\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
	public function actionIndex()
	{
		return $this->render('/default', [
			'assetClass' => 'Simpletree\devui\modules\dbninja\Asset',
			'scriptFile' => 'index.php',
			'iframeOptions' => [
				'height' => 'window',
				'interval' => 'false'
			]
		]);
	}
}
