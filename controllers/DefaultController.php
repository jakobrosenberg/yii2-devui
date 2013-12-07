<?php
/**
 * Created by Jakob
 * Date: 04-12-13
 * Time: 12:29
 */

namespace Simpletree\devui\controllers;


use Simpletree\devui\components\Controller;

class DefaultController extends Controller{

	public function actionIframe($url)
	{
		$this->render('iframe');
	}

	public function actionIndex()
	{
		echo 'hello Index Action';
	}


} 