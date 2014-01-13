<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var Simpletree\devui\models\ProjectApp $model
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Project Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-app-view">

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
			'id_project',
			'id_app',
			'position',
			'module_id',
			'category',
		],
	]); ?>

</div>
