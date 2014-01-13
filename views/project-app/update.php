<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var Simpletree\devui\models\ProjectApp $model
 */

$this->title = 'Update Project App: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Project Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-app-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
