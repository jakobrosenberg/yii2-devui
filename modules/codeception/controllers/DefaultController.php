<?php

namespace Simpletree\devui\modules\codeception\controllers;

use Simpletree\devui\components\Controller;
use Simpletree\devui\models\base\CommandHistory;
use Simpletree\devui\models\Project;
use Simpletree\devui\models\ProjectApp;
use yii\data\ActiveDataProvider;

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
		$result = $this->processCommandLine();
		$model = new CommandHistory([
			'id_project' => Project::getCurrent()->id,
			'id_app' => ProjectApp::getCurrent()->id
		]);

		$commandHistory = new ActiveDataProvider([
			'query' => CommandHistory::find(),
			'pagination' => [
				'pageSize' => 5
			]
		]);

		return $this->render('report',[
			'file'=>\Yii::getAlias('@codeception/'.$this->module->data['paths']['log'].'/report.html'),
			'model'=>$model,
			'result' => $result,
			'commandHistory' => $commandHistory
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
