<?php

namespace Simpletree\devui\models;

/**
 * This is the model class for table "devui_command_history".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $command
 * @property integer $time
 * @property boolean $favorite
 * @property string $result
 */
class CommandHistory extends \Simpletree\devui\models\base\CommandHistory
{
	public function behaviors()
	{
		return [
			'timestamp' => ['class' => 'yii\behaviors\AutoTimestamp'],
		];
	}
}
