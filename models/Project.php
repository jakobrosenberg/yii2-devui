<?php

namespace Simpletree\devui\models;
use yii\web\Cookie;

/**
 * This is the model class for table "devui_project".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property \Simpletree\devui\models\Project $current
 */
class Project extends \Simpletree\devui\models\base\Project
{

	public function behaviors()
	{
		return [
			'timestamp' => ['class' => 'yii\behaviors\AutoTimestamp'],
		];
	}

	public static function getNavigationData()
	{
		$data = [];
		$data[] = ['label'=>'Create project', 'url' => ['/devui/project/create']];
		$data[] = ['label'=>'Manage project apps', 'url' => ['/devui/project/apps']];
		$data[] = ['label'=>'', 'options'=>['class'=>'divider']];
		foreach(self::find()->all() AS $project){
			$data[] = ['label'=>$project->name, 'url' => ['/devui/project/change', 'project'=>$project->id]];
		}
		return $data;
	}


	/**
	 * @param null|int|\Simpletree\devui\models\Project $Project
	 * @return null|\yii\db\ActiveRecord
	 */
	public static function getCurrent($Project = null)
	{
		static $_project;

		if(is_int($Project)){
			$_project = self::find($Project);
		}elseif (is_object($Project)){
			$_project = $Project;
		}

		if ($_project === null){
			if ($projectId = \Yii::$app->request->cookies->getValue('devui_project_id')){
				$_project = Project::find($projectId);
			}

			if (!$_project){
				$_project = Project::find()->one();
			}

			if (!$_project){
				return null;
			}
		}

		$cookie = new Cookie();
		$cookie->name = 'devui_project_id';
		$cookie->value = $_project->id;
		$cookie->expire = time() + 3600*7*30;
		\Yii::$app->response->cookies->add($cookie);

		return $_project;
	}

	/**
	 * @param int|\Simpletree\devui\models\Project $Project
	 * @return null|\yii\db\ActiveRecord
	 */
	public static function setCurrent($Project)
	{
		return self::getCurrent($Project);
	}

	public function getApps()
	{
		return $this->hasMany(ProjectApp::className(), ['id_project' => 'id']);
	}

}
