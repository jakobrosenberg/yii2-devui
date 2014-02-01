<?php

namespace Simpletree\devui;


use Simpletree\devui\models\Project;
use yii\console\controllers\MigrateController;
use Simpletree\devui\models\Command;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\web\Cookie;

/**
 * Class Module
 *
 * @package Simpletree\devui
 * @property $db set with array, a yii\db\connection or the name of a connection in $app->components, for instance "db"
 * @property @project currently active project
 */
class Module extends \yii\base\Module
{
	protected $_project;

	public $defaultRoute = 'dashboard';

	public $layout = 'main';

	protected $_db;


	public function init()
	{
		parent::init();


		\Yii::$app->setComponent('assetManager', ['class'=>'\Simpletree\devui\components\AssetManager']);

		$this->db = 'db';


		$response = \Yii::$app->getResponse();
		//if table doesn't exist
		if(!$this->db->getTableSchema(Project::tableName())){
			if(!in_array(\Yii::$app->requestedRoute, ['devui/setup/install', 'devui/setup/reinstall', 'devui/setup/uninstall'])){
				$response->redirect(Html::url(['/devui/setup/install']))->send();
				exit;
			}
		}
		//else if a project doesn't exist
		elseif (!$this->project){
			if(!in_array(\Yii::$app->requestedRoute, ['devui/project/create', 'devui/setup/reinstall', 'devui/setup/uninstall'])){
				$response->redirect(Html::url(['/devui/project/create']))->send();
				exit;
			}
		}


		elseif( Project::getCurrent()){
			foreach (Project::getCurrent()->apps AS $App){
				$this->setModule($App->info->module_idRecursive, array_merge(['class'=>$App->info->path],[]));
			};
		}


	}



	public function getDb()
	{
		if(!$this->_db){
			$this->setDb();
		}
		return $this->_db;
	}

	public function setDb($db = 'runtime')
	{
		if($db === 'runtime'){
			$db = ['dsn' => "sqlite:" . \Yii::getAlias('@runtime') . "/devui.db"];
		}

		if(is_array($db)){
			$db = new \Yii\db\Connection($db);
			$db->open();
		}

		if(is_string($db)){
			//todo add exception
			$db = \Yii::$app->{$db};
		}

		$this->_db = $db;
	}

	public function getProject()
	{
		return Project::getCurrent();
	}

	public function setProject($Project)
	{
		return Project::setCurrent($Project);
	}



	public function getNav($path)
	{

		$items = [];
		foreach (Project::getCurrent()->apps AS $App){
			$App->recursiveValues = true;
			if(!$actions = $App->actions){
				$actions = [$App->info->name => ['default/index']];
			}

			foreach($actions AS $label => $url){

				$item = [
					'label' => $label,
					'url' => is_string($url) ? $url : [$path . $App->info->module_id . '/' . $url[0]]
				];

				if(isset($App->category) && $App->category !== '/' && $category = $App->category)
				{
					$items[$category]['label'] = $category;
					$items[$category]['items'][] = $item;
				}else{
					$items[] = $item;
				}
			}

		}

		\PC::debug($items);

		return $items;

	}




}
