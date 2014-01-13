<?php

use yii\helpers\Html;
use yii\widgets\ListView;


/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var Simpletree\devui\models\AppSearch $searchModel
 */

$this->title = 'Apps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-index">

	<h1><?= Html::encode($this->title) ?></h1>

<!--	--><?php //echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create App', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?php echo ListView::widget([
		'dataProvider' => $dataProvider,
		'itemOptions' => ['class' => 'item'],
		'itemView' => function ($model, $key, $index, $widget) {
			return Html::a(Html::encode($model->nameRecursive), ['view', 'id' => $model->id]);
		},
	]); ?>

</div>
