<?php

namespace Simpletree\devui\models\base;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use Simpletree\devui\models\App;

/**
 * AppSearch represents the model behind the search form about App.
 */
class AppSearch extends Model
{
	public $id;
	public $position;
	public $path;
	public $name;
	public $description;
	public $module_id;
	public $category;

	public function rules()
	{
		return [
			[['id', 'position'], 'integer'],
			[['path', 'name', 'description', 'module_id', 'category'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'position' => 'Position',
			'path' => 'Path',
			'name' => 'Name',
			'description' => 'Description',
			'module_id' => 'Module ID',
			'category' => 'Category',
		];
	}

	public function search($params)
	{
		$query = App::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'position');
		$this->addCondition($query, 'path', true);
		$this->addCondition($query, 'name', true);
		$this->addCondition($query, 'description', true);
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
