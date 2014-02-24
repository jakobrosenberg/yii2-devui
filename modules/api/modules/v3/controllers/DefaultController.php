<?php

namespace Simpletree\devui\modules\api\modules\v3\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}
}
