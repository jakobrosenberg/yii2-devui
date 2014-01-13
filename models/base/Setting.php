<?php

namespace Simpletree\devui\models\base;

/**
 * This is the model class for table "devui_setting".
 *
 * @property integer $id
 * @property integer $project
 * @property integer $app
 * @property string $key
 * @property string $name
 * @property string $value
 * @property integer $create_time
 * @property integer $update_time
 */
class Setting extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'devui_setting';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['project', 'app', 'create_time', 'update_time'], 'integer'],
			[['key'], 'string', 'max' => 16],
			[['name', 'value'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'project' => 'Project',
			'app' => 'App',
			'key' => 'Key',
			'name' => 'Name',
			'value' => 'Value',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
		];
	}
}
