<?php
/**
 * Created by Jakob
 * Date: 04-12-13
 * Time: 12:10
 */

namespace Simpletree\devui\controllers;


use Simpletree\devui\components\Controller;

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
		if(isset($_POST['confirm']) && $_POST['confirm']){
			$this->getMigration()->safeUp();
			$this->redirect(['/devui/project/create']);
		}
		return $this->render('install');
	}

	public function actionUninstall()
	{
		$this->getMigration()->safeDown();
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

/*	public function normalizeMigrationOptions($options)
	{
		foreach ($options AS $key => $val){
			if(strstr($val, ' ')){
				$val = '"' . $val . '"';
			}
			$options[$key] = "--$key=$val";
		}
		return implode(' ', $options);
	}*/
} 