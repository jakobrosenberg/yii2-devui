<?php
/**
 * Created by Jakob
 * Date: 04-12-13
 * Time: 12:29
 */

namespace Simpletree\devui\controllers;


use Simpletree\devui\components\Controller;

class IframeController extends Controller{

	public $defaultAction = 'index';
	public $method;

	public function actionIndex()
	{
		print_r($this->id);
		echo $this->method;
//		echo 'hello index action from iframe';
	}

	public function actionPassthrough($url)
	{

	}

} 