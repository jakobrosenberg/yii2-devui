<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var Simpletree\devui\models\ProjectApp $model
 */

$this->title = 'Create Project App';
$this->params['breadcrumbs'][] = ['label' => 'Project Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-app-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
