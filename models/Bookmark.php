<?php

namespace Simpletree\devui\models;

/**
 * This is the model class for table "devui_bookmark".
 *
 * @property integer $id
 * @property integer $id_app
 * @property string $url
 * @property string $name
 * @property string $description
 * @property string $time
 */
class Bookmark extends \Simpletree\devui\models\base\Bookmark
{
	public function behaviors()
	{
		return [
			'timestamp' => ['class' => 'yii\behaviors\AutoTimestamp'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return array_merge(parent::rules(), [
			[['id_app', 'create_time', 'update_time'], 'integer'],
			[['url', 'name', 'description'], 'string', 'max' => 255],
			[['id_app', 'url', 'name'], 'required'],
			[['url'], 'unique', 'attributes' => ['id_app', 'url']],
			[['name'], 'unique', 'attributes' => ['id_app', 'name']]
		]);
	}

	public static function createQuery()
	{
		return parent::createQuery()->defaultOrder();
	}

	public static function defaultOrder($query)
	{
		$query->orderBy('id ASC');
	}
}
