<?php

namespace Simpletree\devui\controllers;

use Simpletree\devui\models\App;
use Simpletree\devui\models\Project;
use Simpletree\devui\models\ProjectApp;
use Simpletree\devui\models\ProjectSearch;
use Simpletree\devui\components\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\VerbFilter;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
{
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['post'],
				],
			],
		];
	}

	/**
	 * Lists all Project models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new ProjectSearch;
		$dataProvider = $searchModel->search($_GET);

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single Project model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Project model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		if(!$this->module->project){
			return $this->createFirst();
		}

		$model = new Project;

		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	public function createFirst()
	{
		$this->layout = 'splash';

		$model = new Project;

		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(['dashboard/index', 'id' => $model->id]);
		} else {
			return $this->render('create_first', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing Project model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Project model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		return $this->redirect(['index']);
	}

	/**
	 * Finds the Project model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Project the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Project::find($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	/**
	 * @param int $project
	 */
	public function actionChange($project)
	{
		$project = $this->findModel($project);
		$this->module->project = $project;
		$this->redirect(['/devui/dashboard/index']);
	}

	public function actionApps()
	{

		$Project = Project::getCurrent();

		if(isset($_POST['ProjectApp'])){
			if($id = $_POST['ProjectApp']['id']){
				$model = ProjectApp::find($id);
			}else{
				$model = new ProjectApp();

			}
			\PC::debug($_POST);
			if($model->load($_POST)){
				if(isset($_POST['ProjectApp']['enabled'])){
					unset($_POST['ProjectApp']['enabled']);
					$model->save();
					\PC::debug($model->errors);
				}else{
					$model->delete();
				}
				\PC::debug($model);
			}
		}






		$models = [];
		foreach(App::find()->all() AS $App){
			if(!$App->projectApp){
				$models[] = new ProjectApp([
					'id_app' => $App->id,
					'id_project' => $Project->id
				]);
			}else{
				$models[] = $App->projectApp;
			}
		}


		$dataProvider = new ActiveDataProvider([
			'query' => App::find()
		]);

		echo $this->render('apps', [
			'models' => $models,
			'dataProvider' => $dataProvider
		]);
	}
}
