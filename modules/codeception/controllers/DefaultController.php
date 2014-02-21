<?php

namespace Simpletree\devui\modules\codeception\controllers;

use Simpletree\devui\components\Controller;
use Simpletree\devui\models\base\CommandHistory;
use Simpletree\devui\models\Project;
use Simpletree\devui\models\ProjectApp;

class DefaultController extends Controller
{
	public function actionCoverage()
	{
		$this->processCommandLine();
		$file = \Yii::getAlias('@codeception/'.$this->module->data['paths']['log'].'/coverage/index.html');
		return $this->render('coverage',['file'=>$file]);
	}

	public function actionReport()
	{
		$file = \Yii::getAlias('@codeception/'.$this->module->data['paths']['log'].'/report.html');

		$result = $this->processCommandLine();
		$model = new CommandHistory([
			'id_project' => Project::getCurrent()->id,
			'id_app' => ProjectApp::getCurrent()->id
		]);

		\PC::debug($model);

		return $this->render('report',[
			'file'=>$file,
			'model'=>$model,
			'result' => $result,
		]);
	}

	public function processCommandLine()
	{
		if(isset($_POST['CommandHistory'])){
			chdir(\Yii::getAlias('@codeception'));
			$model = new CommandHistory();
			$model->load($_POST);
			$model->save();
			$model->result = shell_exec($model->command);
			$model->save();
			return $model->result;
		}
	}
}
