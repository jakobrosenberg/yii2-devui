<?php

namespace Simpletree\devui;


use Simpletree\devui\models\Project;
use yii\console\controllers\MigrateController;
use Simpletree\devui\models\Command;
use yii\helpers\Html;
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

	public $id = 'devui';

	//path to codeception.yml
	public $path = '@app';

	//custom codeception.yml configuration
	public $config = [];

	//custom commands
	public $commands = [
		'functional' => 'php codecept.phar run functional --html',
		'acceptance' => 'php codecept.phar run acceptance --html'
	];

	public $defaultRoute = 'dashboard';

	public $layout = 'main';


	//default codeception.yml configuration
	protected $_config = [
		'tests' => 'tests',
    	'log' => 'tests/_log',
    	'data' => 'tests/_data',
    	'helpers' => 'tests/_helpers'
	];

	public $controllerNamespace = 'Simpletree\devui\controllers';

	protected $_db;

	public function init()
	{
		parent::init();

		if(!$this->hasModule('gii')){
			$this->setModule('gii', [
				'class' => 'yii\gii\Module',
				'allowedIPs' => ['127.0.0.1', '10.10.10.1', '::1'],
			]);
		}
		$gii = $this->getModule('gii');
		$gii->setLayoutPath('@Simpletree/devui/views/layouts/gii');

		\Yii::$app->setModule('_devui', $this);

		// merge user config with default config
		$this->config = array_merge($this->_config, $this->config);

		//set alias
		\Yii::setAlias('codeceptionLog', $this->getRealPathFor('log'));


		$this->db = 'db';


//		$project = new Project();
//		die($project->getTableSchema());

//		die(\Yii::$app->requestedRoute);
//		echo \Yii::$app->requestedRoute;
//		if(!\Yii::$app->requestedRoute == 'devui/setup/install')
//			echo 'table exists';

		$response = \Yii::$app->getResponse();
		//if table don't exist
		if(!$this->db->getTableSchema(Project::tableName())){
			if(\Yii::$app->requestedRoute !== 'devui/setup/install'){
				$response->redirect(Html::url(['/devui/setup/install']));
			}
		}
	}

	/**
	 * Returns the real path of a $config item
	 * @param $path
	 * @return string
	 */
	public function getRealPathFor($path)
	{
		$path = $this->config[$path];
		if(substr($path, 0, 1) !== '/')		{
			$path = \Yii::getAlias($this->path . '/' . $path);
		}
		return $path;
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
		if(!$this->_project){
			if ($projectId = \Yii::$app->request->cookies->getValue('devui_project_id')){
				$this->_project = Project::find($projectId);
			}else{
				$this->_project = Project::find()->one();
			}
		}
		return $this->_project;
	}

	public function setProject($Project)
	{
		$cookie = new Cookie();
		$cookie->name = 'devui_project_id';
		$cookie->value = $Project->id;
		$cookie->expire = time() + 3600*7*30;
		\Yii::$app->response->cookies->add($cookie);
		$this->_project = $Project;
	}

	public function getRoute()
	{

	}
}
