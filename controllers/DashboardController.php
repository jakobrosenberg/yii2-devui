<?php

namespace Simpletree\devui\controllers;

use Simpletree\devui\components\Controller;

class DashboardController extends Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}
}
