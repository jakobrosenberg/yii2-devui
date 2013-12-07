<?php

namespace Simpletree\devui\controllers;


use Simpletree\devui\components\Controller;

class DbController extends Controller
{
	public function actionChive()
	{
		return $this->render('/iframe/asset', [
			'assetClass' => 'Simpletree\devui\ChiveAsset',
			'scriptFile' => 'index.php',
			'iframeOptions' => [
				'height' => 'window',
				'interval' => 'false'
			]
		]);
	}

	public function actionDbninja()
	{
		return $this->render('/iframe/asset', [
			'assetClass' => 'Simpletree\devui\DbninjaAsset',
			'scriptFile' => 'index.php',
			'iframeOptions' => [
				'height' => 'window',
				'interval' => 'false'
			]
		]);
	}
	public function actionAdminer()
	{
		return $this->render('/iframe/asset', [
			'assetClass' => 'Simpletree\devui\AdminerAsset',
			'scriptFile' => 'index.php',
			'iframeOptions' => [
				'height' => 'window',
				'interval' => 'false'
			]
		]);
	}
}
