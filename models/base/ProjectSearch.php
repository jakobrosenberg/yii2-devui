<?php

namespace Simpletree\devui\models\base;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use Simpletree\devui\models\Project;

/**
 * ProjectSearch represents the model behind the search form about Project.
 */
class ProjectSearch extends Model
{
	public $id;
	public $name;
	public $description;

	public function rules()
	{
		return [
			[['id'], 'integer'],
			[['name', 'description'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
		];
	}

	public function search($params)
	{
		$query = Project::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'name', true);
		$this->addCondition($query, 'description', true);
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
