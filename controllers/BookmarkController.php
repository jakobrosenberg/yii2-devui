<?php

namespace Simpletree\devui\controllers;

use Simpletree\devui\models\Bookmark;

class BookmarkController extends \yii\web\Controller
{
	public function actionSave()
	{
		$model = new Bookmark();
		$model->load($_POST);
		if(!$model->save())
			print_r($model->errors);
	}

}
