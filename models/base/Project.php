<?php

namespace Simpletree\devui\models\base;

/**
 * This is the model class for table "devui_project".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $create_time
 * @property integer $update_time
 */
class Project extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'devui_project';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['name'], 'required'],
			[['create_time', 'update_time'], 'integer'],
			[['name', 'description'], 'string', 'max' => 255]
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
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
		];
	}
}
