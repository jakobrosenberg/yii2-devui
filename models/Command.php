<?php
/**
 * Created by Jakob
 * Date: 29-11-13
 * Time: 20:54
 */

namespace Simpletree\devui\models;


use yii\base\Model;
use yii\db\ActiveRecord;


/**
 * Class command
 *
 * @package Simpletree\devui\models
 * @var $list array
 */
class Command extends ActiveRecord{

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'dev_sc_command_history';
	}

	public static function getDb()
	{
		return \Yii::$app->module;
	}

	public function getList()
	{
		$commands = \Yii::$app->module->commands;
		return array_flip($commands);
	}



} 