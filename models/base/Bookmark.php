<?php

namespace Simpletree\devui\models\base;

/**
 * This is the model class for table "devui_bookmark".
 *
 * @property integer $id
 * @property integer $id_app
 * @property string $url
 * @property string $name
 * @property boolean $default
 * @property string $description
 * @property integer $create_time
 * @property integer $update_time
 */
class Bookmark extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'devui_bookmark';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['id_app', 'create_time', 'update_time'], 'integer'],
			[['default'], 'boolean'],
			[['url', 'name', 'description'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'id_app' => 'Id App',
			'url' => 'Url',
			'name' => 'Name',
			'default' => 'Default',
			'description' => 'Description',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
		];
	}
}
