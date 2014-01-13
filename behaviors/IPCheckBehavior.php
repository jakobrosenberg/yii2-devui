<?php
/**
 * Created by Jakob
 * Date: 15-12-13
 * Time: 00:35
 */

namespace Simpletree\devui\Behaviors;


use Simpletree\devui\Module;
use yii\base\Behavior;
use yii\base\Controller;
use yii\db\ActiveRecord;

class IPCheckBehavior extends Behavior{

	public $allowedIPs = ['333'];

	/**
	 * @inheritdoc
	 */
//	public function beforeAction($action)
//	{
//		die('beforeAction die');
//		if ($this->checkAccess()) {
//			return parent::beforeAction($action);
//		} else {
//			throw new AccessDeniedHttpException('You are not allowed to access this page.');
//		}
//	}

	public function events()
	{
		return [
			'beforeAction'=>['checkAccess']
		];
	}

	/**
	 * @return boolean whether the module can be accessed by the current user
	 */
	public function checkAccess()
	{die('diecheckaccess');
		$ip = Yii::$app->getRequest()->getUserIP();
		foreach ($this->allowedIPs as $filter) {
			if ($filter === '*' || $filter === $ip || (($pos = strpos($filter, '*')) !== false && !strncmp($ip, $filter, $pos))) {
				return true;
			}
		}
		Yii::warning('Access to Gii is denied due to IP address restriction. The requested IP is ' . $ip, __METHOD__);
		return false;
	}


} 