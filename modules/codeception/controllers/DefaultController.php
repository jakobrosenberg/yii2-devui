<?php

namespace Simpletree\devui\modules\codeception\controllers;

use Simpletree\devui\components\Controller;

class DefaultController extends Controller
{
	public function actionCoverage()
	{
		$file = $this->module->getRealPathFor('log').'/coverage/index.html';
		return $this->render('coverage',['file'=>$file]);
	}

	public function actionReport()
	{
		$file = $this->module->getRealPathFor('log').'/report.html';
		return $this->render('report',['file'=>$file]);
	}
}
