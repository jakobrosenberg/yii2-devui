<?php

namespace Simpletree\devui\models\base;

/**
 * This is the model class for table "devui_command_history".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $command
 * @property integer $create_time
 * @property boolean $favorite
 * @property string $result
 */
class CommandHistory extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'devui_command_history';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['project_id', 'create_time'], 'integer'],
			[['favorite'], 'boolean'],
			[['result'], 'string'],
			[['command'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'project_id' => 'Project ID',
			'command' => 'Command',
			'create_time' => 'Create Time',
			'favorite' => 'Favorite',
			'result' => 'Result',
		];
	}
}
