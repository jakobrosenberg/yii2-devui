<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var Simpletree\devui\models\App $model
 */
$model->recursiveValues = true;
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
			'data-method' => 'post',
		]); ?>
	</p>


	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'id',
			'position',
			'path',
			'name',
			'description',
			'module_id',
			'category',
			'create_time',
			'update_time',
		],
	]); ?>

</div>
