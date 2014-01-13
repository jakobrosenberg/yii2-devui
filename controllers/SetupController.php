<?php
/**
 * Created by Jakob
 * Date: 04-12-13
 * Time: 12:10
 */

namespace Simpletree\devui\controllers;


use Simpletree\devui\components\Controller;
use Simpletree\devui\models\Project;

/**
 * Class SettingsController
 *
 * @package Simpletree\devui\controllers
 * @property $migration
 */
class SetupController extends Controller{

	public function actionIndex()
	{
		echo 'test';
//		return $this->render('index');
	}

	public function actionInstall()
	{
		$this->layout = 'splash';
		if(isset($_POST['confirm']) && $_POST['confirm']){

			$this->getMigration()->safeUp();
			$this->redirect(['dashboard/index']);
		}
		return $this->render('install');
	}

	public function actionUninstall()
	{
		if(isset($_POST['confirm']) && $_POST['confirm']){
			$this->getMigration()->safeDown();
			$this->redirect(['dashboard/index'])->send();
			exit;
		}
		return $this->render('uninstall');
	}

	public function actionReinstall()
	{
		$this->getMigration()->safeDown();
		$this->getMigration()->safeUp();
		$this->redirect(['dashboard/index']);
	}


	/**
	 * @return \Simpletree\devui\migrations\MainMigration
	 */
	public function getMigration()
	{
		$db = $this->module->db;


		$migration = new \Simpletree\devui\migrations\MainMigration;
		if($db){
			$migration->db = $db;
		}
		return $migration;
	}

} 