<?php

namespace Simpletree\devui\controllers;

use Simpletree\devui\components\Controller;

class CoverageController extends Controller
{
	public function actionIndex()
	{
		$file = $this->module->getRealPathFor('log').'/coverage/index.html';
		return $this->render('index',['file'=>$file]);
	}
}
