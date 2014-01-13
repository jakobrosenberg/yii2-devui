<?php

namespace Simpletree\devui\models;

/**
 * This is the model class for table "devui_project_app".
 *
 * @property integer $id
 * @property integer $id_project
 * @property integer $id_app
 * @property integer $position
 * @property string $category
 */
class ProjectApp extends \Simpletree\devui\models\base\ProjectApp
{
	public $recursiveValues = false;

	public function behaviors()
	{
		return [
			'timestamp' => ['class' => 'yii\behaviors\AutoTimestamp'],
		];
	}

	public function getInfo()
	{
		return $this->hasOne(App::className(), ['id' => 'id_app']);
	}

	public function __get($name)
	{
		if($value = parent::__get($name)){
			return $value;
		}
		elseif($this->recursiveValues){
			$this->info->recursiveValues = true;
			return $this->info->$name;
		}
	}

	public function beforeValidate()
	{
		$this->actions = '';
		return true;
	}
}
