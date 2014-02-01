<?php

namespace Simpletree\devui\models;
use yii\helpers\ArrayHelper;
use yii\web\HttpException;

/**
 * This is the model class for table "devui_app".
 *
 * @property integer $id
 * @property integer $position
 * @property string $path
 * @property string $name
 * @property string $icon
 * @property string $actions
 * @property string $description
 * @property string $module_id
 * @property string $category
 * @property integer $create_time
 * @property integer $update_time
 */
class App extends \Simpletree\devui\models\base\App
{

	public function behaviors()
	{
		return [
			'timestamp' => ['class' => 'yii\behaviors\AutoTimestamp'],
		];
	}

	/**
	 * Use values from the associated module if the respective attribute is empty
	 * @var
	 */
	public $recursiveValues = false;


	/**
	 * returns the default attribute value from the associated module
	 * @param string $attribute
	 * @return array
	 */
	public function getModuleAttributes()
	{
		return [
			'module_id' => 'moduleId'
		];
	}


	/**
	 * @param string $name
	 * @return mixed
	 */
	public function __get($name)
	{
		$recursive = ($this->recursiveValues || preg_match('/Recursive$/',$name)) ? true : false;
		$name = preg_replace('/Recursive?/', '', $name);


		if($value = parent::__get($name)){
			return $value;
		}elseif($recursive && $class = $this->path)
		{
			$name = ArrayHelper::getValue($this->getModuleAttributes(), $name, $name);

			if(property_exists($class, $name)){
				return $class::$$name;
			}
		}
	}

	/**
	 * @inheritdoc
	 */
	public function beforeValidate()
	{
		if(!class_exists($this->path)){
			$this->addError('path', 'The path must contain fully qualified namespace name.');
		}
		$this->actions = '';
		return true;
	}

	public function getProjectApp()
	{
		$Project = Project::getCurrent();
		return $this->hasOne(ProjectApp::className(), ['id_app' => 'id'])->where(['id_project'=>$Project->id]);

	}
}
