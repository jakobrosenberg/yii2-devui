<?php
namespace Simpletree\devui\components;

use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class Api extends Component
{
	/**
	 * @var string the model class that this API is serving
	 */
	public $modelClass;
	/**
	 * @var string the scenario to be used by [[create()]] and [[update()]]
	 */
	public $scenario = 'api';
	/**
	 * @var mixed the context information. You may set it to be the current user.
	 * You can use the context information to determine what fields can be returned for a model.
	 */
	public $context;
	/**
	 * @var string the option name for specifying which fields should be returned back
	 */
	public $optionFields = 'fields';
	/**
	 * @var string the option name for specifying which fields need to be expanded
	 */
	public $optionExpand = 'expand';
	/**
	 * @var string the option name for specifying which page of the models to be returned.
	 */
	public $optionPage = 'page';
	/**
	 * @var string the option name for specifying how to sort the models to be returned.
	 */
	public $optionSort = 'sort';
	/**
	 * @var string the option name for specifying the page size
	 */
	public $optionLimit = 'limit';


	public function init()
	{
		parent::init();
		if ($this->modelClass === null) {
			throw new InvalidConfigException('The "modelClass" property must be set.');
		}
	}

	public function get($id, $options = [])
	{
		return $this->export($this->load($id), $options);
	}

	public function getAll($options = [])
	{
		$dataProvider = $this->createDataProvider($options);
		$items = $this->exportAll($dataProvider->getModels());
		return [
			'total' => $dataProvider->totalCount,
			'page' => $dataProvider->pagination->page,
			'count' => count($items),
			'items' => $items,
		];
	}

	/**
	 * @param array $data the data (name-value pairs) provided by end user for creating the model
	 * @return array
	 */
	public function create($data)
	{
		/**
		 * @var \yii\db\BaseActiveRecord $model
		 */
		$model = new $this->modelClass([
			'scenario' => $this->scenario,
		]);
		$model->load($data, '');
		if ($model->save()) {
			return $this->export($model);
		} else {
			return $this->exportErrors($model->getFirstErrors());
		}
	}

	/**
	 * @param string|integer|array $id the primary key value of the model. Use an array (name-value pairs) for composite primary keys.
	 * @param array $data the data (name-value pairs) provided by end user for updating the model
	 * @return array
	 */
	public function update($id, $data)
	{
		/**
		 * @var \yii\db\BaseActiveRecord $model
		 */
		$model = $this->load($id);
		$model->scenario = $this->scenario;
		$model->load($data, '');
		if ($model->save()) {
			return $this->export($model);
		} else {
			return $this->exportErrors($model->getFirstErrors());
		}
	}

	/**
	 * @param string|integer|array $id the primary key value of the model. Use an array (name-value pairs) for composite primary keys.
	 * @return bool
	 */
	public function delete($id)
	{
		$model = $this->load($id);
		$model->delete();
		return $this->export($model);
	}

	/**
	 * @param string|integer|array $id
	 * @return \yii\db\ActiveRecord
	 * @throws \yii\web\NotFoundHttpException
	 */
	protected function load($id)
	{
		/**
		 * @var \yii\db\BaseActiveRecord $modelClass
		 */
		$modelClass = $this->modelClass;
		$model = $modelClass::find($id);
		if ($model !== null) {
			return $model;
		} else {
			if (is_array($id)) {
				$values = [];
				foreach ($id as $name => $value) {
					$values[] = "$name=$value";
				}
				$id = implode(', ', $values);
			}
			throw new NotFoundHttpException("Object not found: $id");
		}
	}

	protected function createDataProvider($options = [])
	{
		/**
		 * @var \yii\db\BaseActiveRecord $modelClass
		 */
		$modelClass = $this->modelClass;
		return new ActiveDataProvider([
			'query' => $modelClass::find(),
			'pagination' => [
//				'pageVar' => $this->optionPage,
				'params' => $options,
				// todo: pageSize
			],
			'sort' => [
//				'sortVar' => $this->optionSort,
			],
		]);
	}

	public function export($models, $options = [])
	{
		$fields = $this->getFields($options);
		return $this->exportModel($models, $fields);
	}

	public function exportAll($models, $options = [])
	{
		$fields = $this->getFields($options);
		$result = [];
		foreach ($models as $model) {
			$result[] = $this->exportModel($model, $fields);
		}
		return $result;
	}

	/**
	 * Returns the Api class for the specified model class.
	 * @param $modelClass
	 * @return static
	 */
	protected function getApi($modelClass)
	{
		// todo: generate the correct Api class for the specified model class
		return new static(['modelClass' => $modelClass]);
	}

	/**
	 * Filters the data to be exported to end user.
	 * @param $data
	 * @return mixed
	 */
	protected function filter($data)
	{
		return $data;
	}

	/**
	 * Returns the fields of the model that need to be returned to end user
	 * @param $options
	 * @return array field name => field definition (attribute name or callback)
	 */
	protected function getFields($options)
	{
		$fields = isset($options[$this->optionFields]) ? $options[$this->optionFields] : '';
		$fields = preg_split('/\s*,\s*/', $fields, -1, PREG_SPLIT_NO_EMPTY);

		$result = [];

		foreach ($this->fields() as $field => $definition) {
			if (is_integer($field)) {
				$field = $definition;
			}
			if (empty($fields) || in_array($field, $fields, true)) {
				$result[$field] = $definition;
			}
		}

		$expand = isset($options[$this->optionExpand]) ? $options[$this->optionExpand] : '';
		$expand = preg_split('/\s*,\s*/', $expand, -1, PREG_SPLIT_NO_EMPTY);

		if (empty($expand)) {
			return $result;
		}

		foreach ($this->fields() as $field => $definition) {
			if (is_integer($field)) {
				$field = $definition;
			}
			if (in_array($field, $expand, true)) {
				$result[$field] = $definition;
			}
		}

		return $result;
	}

	/**
	 * List of fields that can be returned to end users.
	 *
	 * These are the fields that should be returned by default when a user does not explicitly specify which
	 * fields to return for a model. If the user explicitly which fields to return, only the fields declared
	 * in this method can be returned. All other fields will be ignored.
	 *
	 * By default, this method returns [[Model::attributes()]], which are the attributes defined by a model.
	 *
	 * You may override this method to select which fields can be returned or define new fields.
	 *
	 * The value returned by this method should be an array of field definitions. The array keys
	 * are the field names, and the array values are the corresponding attribute names or callbacks
	 * returning field values. If a field name is the same as the corresponding attribute name,
	 * you can use the field name without a key.
	 *
	 * @return array field name => attribute name or definition
	 */
	protected function fields()
	{
		/* @var \yii\db\BaseActiveRecord $model */
		$model = new $this->modelClass;
		return $model->attributes();
	}

	/**
	 * List of additional fields that can be returned to end users.
	 *
	 * This method defines additional fields (usually relations of a model) that can be returned to end users.
	 *
	 * @return array field name => attribute name or definition
	 */
	protected function expand()
	{
		return [];
	}

	protected function exportModel($model, $fields)
	{
		$data = [];
		foreach ($fields as $field => $attribute) {
			if (is_string($attribute)) {
				$value = $model->$attribute;
			} else {
				$value = call_user_func($attribute, $model, $field);
			}
			if (is_object($value)) {
				$value = $this->getApi(get_class($value))->export($value);
			} elseif (is_array($value)) {
				foreach ($value as $i => $v) {
					if (is_object($v)) {
						$value[$i] = $this->getApi(get_class($v))->export($v);
					}
				}
			}
			$data[$field] = $value;
		}
		return $this->filter($data);
	}

	protected function exportErrors($errors)
	{
		$result = [
			'code' => 1024,
			'message' => 'Validation Failed',
			'errors' => [],
		];
		foreach ($errors as $name => $message) {
			$result['errors'][] = [
				'field' => $name,
				'message' => $message,
			];
		}
		return $result;
	}
}