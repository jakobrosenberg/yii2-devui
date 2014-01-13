<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var Simpletree\devui\models\Project $model
 */

$this->title = 'Oh no!';
?>
<div class="jumbotron">

	<div class="project-create-first">

		<h1><?= Html::encode($this->title) ?></h1>
		<p>For some reason you don't have a project. Please create one.</p>

		<div class="project-form">

			<?php $form = ActiveForm::begin([
				'options' => [
					'class' => 'form-inline',
					'role' => 'form'
				],
				'fieldConfig' => [
					'inputOptions' => [
						'class' => 'form-control input-lg',
						'placeholder' => '{name}'
					],
					'labelOptions' => [
						'class' => 'sr-only'
					],
					'options' => [
						'class' => 'form-group'
					],
					'template' => "{label}\n{input}\n{hint}",
				]
			]); ?>

			<?= $form->field($model, 'name')->textInput(['maxlength' => 255, 'placeholder'=>'Name']) ?>




			<?= Html::submitButton('Create', ['class' => 'btn btn-success btn-lg']) ?>


			<?php ActiveForm::end(); ?>

		</div>


	</div>

</div>

<style>
	.jumbotron input.input-lg {
		font-size: 21px;
		padding: 28px 24px;
		/*line-height: 1.33;*/
		/*display: inline-block;*/
	}
</style>