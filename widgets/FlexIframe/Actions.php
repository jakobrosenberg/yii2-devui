<?php
/**
 * Created by Jakob
 * Date: 02-02-14
 * Time: 00:16
 */

namespace Simpletree\devui\widgets\FlexIframe;


use Simpletree\devui\models\Bookmark;
use yii\base\Action;
use yii\web\HttpException;
use yii\widgets\ActiveForm;

class Actions extends Action{

	public function run($action)
	{
		call_user_func([$this, 'action'.$action]);
	}

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
			$af = new ActiveForm();
			throw new HttpException(500, $af->errorSummary($model));
		}else
		{
			echo BookmarkList::widget([
				'bookmarks' => Bookmark::find()->where(['id_app' => 1])->all(),
				'model' => $model
			]);


		}
	}

	public function actionDelete()
	{
		$id = $_GET['id'];
		Bookmark::find($id)->delete();
	}

} 