<?php

namespace Simpletree\devui\controllers;

use Simpletree\devui\components\Helper;
use Simpletree\devui\models\Bookmark;
use Simpletree\Foundation\Html;
use yii\web\HttpException;
use yii\widgets\ActiveForm;

class BookmarkController extends \yii\web\Controller
{
	public function actionSave()
	{

		$model = new Bookmark();
		$model->save();

		if(isset($_POST['Bookmark']['default']) && $_POST['Bookmark']['default'])
		{
			Bookmark::updateAll(['default' => false], ['id_app' => $_POST['Bookmark']['default']]);
		}


		$model = Bookmark::find(['url' => $_POST['Bookmark']['url']]) or $model = new Bookmark();

		$model->load($_POST);


		if(!$model->save() && false)
		{
			$af = new ActiveForm;
			throw new HttpException(500, $af->errorSummary($model));
		}else
		{
			echo $this->renderPartial('/iframe/bookmarkList', [
				'bookmarks' => Bookmark::find()->where(['id_app' => 1])->all(),
				'model' => $model
			]);
		}
	}

	public function actionDelete($id)
	{
		Bookmark::find($id)->delete();
	}

}
