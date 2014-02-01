<?php
/**
 * Created by Jakob
 * Date: 07-12-13
 * Time: 11:34
 */

namespace Simpletree\devui\components;


class Helper {

	/**
	 * Traverses through the module and its ancestors and returns the first module that matches $class. Returns null if not found.
	 * @param string $class
	 * @param \yii\base\Module $module
	 * @return null|\yii\base\Module
	 */
	public static function module($class, $module = null)
	{
		if(!$module)
		{
			$module = \Yii::$app->controller->module;
		}

		while (get_class($module) !== $class){
			if(($module->module)){
				$module = $module->module;
			}else {
				return null;
			}
		}
		return $module;
	}

	public static function devuiModule()
	{
		return self::module('Simpletree\devui\Module');
	}

//	/**
//	 * @param string|\yii\base\Module $module
//	 * @param \yii\web\View $view
//	 * @return string
//	 */
//	public static function getPathToModule($module, $view = null)
//	{
//		if(is_string($module)){
//			$module = static::module($module, $view);
//		}
//		$path ="/";
//		while(isset($module->module) && $module->module){
//			$path = '/' . $module->id . $path;
//			$module = $module->module;
//		}
//		return $path;
//	}
} 