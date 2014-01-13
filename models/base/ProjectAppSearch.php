<?php

namespace Simpletree\devui\models\base;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use Simpletree\devui\models\ProjectApp;

/**
 * ProjectAppSearch represents the model behind the search form about ProjectApp.
 */
class ProjectAppSearch extends Model
{
	public $id;
	public $id_project;
	public $id_app;
	public $position;
	public $module_id;
	public $category;

	public function rules()
	{
		return [
			[['id', 'id_project', 'id_app', 'position'], 'integer'],
			[['module_id', 'category'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'id_project' => 'Id Project',
			'id_app' => 'Id App',
			'position' => 'Position',
			'module_id' => 'Module ID',
			'category' => 'Category',
		];
	}

	public function search($params)
	{
		$query = ProjectApp::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'id_project');
		$this->addCondition($query, 'id_app');
		$this->addCondition($query, 'position');
		$this->addCondition($query, 'module_id', true);
		$this->addCondition($query, 'category', true);
		return $dataProvider;
	}

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		$value = $this->$attribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$value = '%' . strtr($value, ['%'=>'\%', '_'=>'\_', '\\'=>'\\\\']) . '%';
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}
}
