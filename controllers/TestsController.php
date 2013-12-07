<?php

namespace Simpletree\devui\controllers;

use Simpletree\devui\components\Controller;

class TestsController extends Controller
{
	public function actionIndex()
	{
		if(isset($_POST['test_command'])){
			$this->runCommand($_POST['test_command']);
		}
		return $this->render('index');
	}

	public function runCommand($command)
	{
		$path = \Yii::getAlias($this->module->path);
		chdir($path);
		shell_exec ($command);
	}
}
