<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var Simpletree\devui\models\ProjectAppSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="project-app-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'id_project') ?>

		<?= $form->field($model, 'id_app') ?>

		<?= $form->field($model, 'position') ?>

		<?= $form->field($model, 'module_id') ?>

		<?php // echo $form->field($model, 'category') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
