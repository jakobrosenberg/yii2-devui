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
}
