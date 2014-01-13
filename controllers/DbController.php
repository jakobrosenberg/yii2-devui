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

	public function actionSqldesigner()
	{
		return $this->render('/iframe/asset', [
			'assetClass' => 'Simpletree\devui\SqldesignerAsset',
//			'scriptFile' => 'index.php',
			'iframeOptions' => [
				'height' => 'window',
				'interval' => 'false'
			]
		]);
	}

	public function actionPhpmyadmin()
	{
		return $this->render('/iframe/asset', [
			'assetClass' => 'Simpletree\devui\PhpmyadminAsset',
//			'scriptFile' => 'index.php',
			'iframeOptions' => [
				'height' => 'window',
				'interval' => 'false'
			]
		]);
	}
}
