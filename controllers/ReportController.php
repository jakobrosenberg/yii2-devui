<?php

namespace Simpletree\devui\controllers;

use Simpletree\devui\components\Controller;

class ReportController extends Controller
{
	public function actionIndex()
	{
		$file = $this->module->getRealPathFor('log').'/report.html';
		return $this->render('index',['file'=>$file]);
	}
}
