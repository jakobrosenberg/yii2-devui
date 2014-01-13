<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var Simpletree\devui\models\App $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<?php $model->recursiveValues = false ?>

<div class="app-form">

	<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'position')->textInput() ?>

		<?= $form->field($model, 'path')->textInput(['maxlength' => 255]) ?>

		<?= $form->field($model, 'name')->textInput(['maxlength' => 255, 'placeholder'=>$model->nameRecursive]) ?>

		<?= $form->field($model, 'description')->textInput(['maxlength' => 255, 'placeholder'=>$model->descriptionRecursive]) ?>

		<?= $form->field($model, 'module_id')->textInput(['maxlength' => 255, 'placeholder'=>$model->module_idRecursive]) ?>

		<?= $form->field($model, 'category')->textInput(['maxlength' => 255, 'placeholder'=>$model->categoryRecursive]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
