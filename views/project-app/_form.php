<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var Simpletree\devui\models\ProjectApp $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="project-app-form">

	<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'position')->textInput() ?>

		<?= $form->field($model, 'module_id')->textInput(['maxlength' => 255]) ?>

		<?= $form->field($model, 'category')->textInput(['maxlength' => 255]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
