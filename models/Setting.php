<?php

namespace Simpletree\devui\models;

/**
 * This is the model class for table "devui_setting".
 *
 * @property integer $id
 * @property integer $project
 * @property string $key
 * @property string $name
 * @property string $value
 * @property integer $time
 */
class Setting extends \Simpletree\devui\models\base\Setting
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
	public function behaviors()
	{
		return [
			'timestamp' => [
				'class' => 'yii\behaviors\AutoTimestamp',
				'attributes' => [
					ActiveRecord::EVENT_BEFORE_INSERT => ['create_time', 'update_time'],
					ActiveRecord::EVENT_BEFORE_UPDATE => 'update_time',
				],
			],
		];
	}
}
