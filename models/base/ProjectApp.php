<?php

namespace Simpletree\devui\models\base;

/**
 * This is the model class for table "devui_project_app".
 *
 * @property integer $id
 * @property integer $id_project
 * @property integer $id_app
 * @property string $actions
 * @property integer $position
 * @property string $category
 * @property integer $create_time
 * @property integer $update_time
 */
class ProjectApp extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'devui_project_app';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['id_project', 'id_app'], 'required'],
			[['id_project', 'id_app', 'position', 'create_time', 'update_time'], 'integer'],
			[['actions', 'category'], 'string', 'max' => 255]
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
			'actions' => 'Actions',
			'position' => 'Position',
			'category' => 'Category',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
		];
	}
}
