<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var Simpletree\devui\models\App $model
 */

$this->title = 'Update App: ' . $model->nameRecursive;
$this->params['breadcrumbs'][] = ['label' => 'Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nameRecursive, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="app-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
