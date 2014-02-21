<?php

namespace Simpletree\devui\models\base;

/**
 * This is the model class for table "devui_command_history".
 *
 * @property integer $id
 * @property integer $id_project
 * @property integer $id_app
 * @property string $command
 * @property string $name
 * @property boolean $favorite
 * @property string $result
 * @property integer $create_time
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
			[['id_project', 'id_app', 'create_time'], 'integer'],
			[['favorite'], 'boolean'],
			[['result'], 'string'],
			[['command', 'name'], 'string', 'max' => 255]
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
			'command' => 'Command',
			'name' => 'Name',
			'favorite' => 'Favorite',
			'result' => 'Result',
			'create_time' => 'Create Time',
		];
	}
}
