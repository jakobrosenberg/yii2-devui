<?php

namespace Simpletree\devui\models\base;

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
class App extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'devui_app';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['position', 'create_time', 'update_time'], 'integer'],
			[['path', 'name', 'icon', 'actions', 'description', 'module_id', 'category'], 'string', 'max' => 255]
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
			'icon' => 'Icon',
			'actions' => 'Actions',
			'description' => 'Description',
			'module_id' => 'Module ID',
			'category' => 'Category',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
		];
	}
}
