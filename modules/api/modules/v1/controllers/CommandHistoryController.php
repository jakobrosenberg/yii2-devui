<?php
/**
 * Created by Jakob
 * Date: 24-02-14
 * Time: 22:04
 */

namespace Simpletree\devui\modules\api\modules\v1\controllers;


use Yii;
use Simpletree\devui\components\Api;
use yii\web\Controller;
use yii\web\Response;

class CommandHistoryController extends Controller{

	public function init()
	{
		parent::init();
		Yii::$app->response->format = Response::FORMAT_JSON;
	}

	public function actionIndex()
	{
		return $this->getApi()->getAll(Yii::$app->request->get());
	}

	public function actionView($id)
	{
		return $this->getApi()->get($id, Yii::$app->request->get());
	}

	public function actionCreate()
	{
		return $this->getApi()->create(Yii::$app->request->post);
	}

	public function actionUpdate($id)
	{
		return $this->getApi()->update($id, Yii::$app->request->put);
	}

	public function actionDelete($id)
	{
		return $this->getApi()->delete($id);
	}

	protected function getApi()
	{
		$model =  Yii::createObject([
			'class' => 'Simpletree\devui\components\Api',
			'modelClass' => 'Simpletree\devui\models\CommandHistory'
		]);
		return $model;
	}

	public function actionTest()
	{

	}

} 