<?php

use yii\widgets\ActiveForm;
use Simpletree\devui\models\Project;
use Simpletree\devui\models\ProjectApp;
use yii\helpers\Html;

/**
 * Created by Jakob
 * Date: 23-01-14
 * Time: 11:51
 * @var Simpletree\devui\models\App $model
 * @var yii\web\View $this
 */



if(!$ProjectApp = $model->projectApp){
	$ProjectApp = new ProjectApp([
		'id_app' => $model->id,
		'id_project' => Project::getCurrent()->id
	]);
}

?>




<?php $form = ActiveForm::begin([
	'options'=>['class'=>'project-app_form']
]) ?>
	<table class="table app-table">
		<tbody>
		<?php if(!$index): ?>
			<tr>
				<th class="name">Name</th>
				<th class="category">Category</th>
				<th class="enabled">Enabled</th>
				<th class="save"></th>
			</tr>
		<?php endif?>
		<tr class="app-table-row <?= $ProjectApp->isNewRecord? 'disabled' : 'enabled' ?>">
			<td class="name">
				<div class="app-table-name"><?= $model->nameRecursive ?></div>
			</td>
			<td class="category">
				<?= \yii\helpers\Html::activeTextInput($ProjectApp, 'category', ['class'=>'form-control', 'placeholder'=>$model->categoryRecursive]); ?>
				<?= \yii\helpers\Html::activeHiddenInput($ProjectApp, 'id_project'); ?>
				<?= \yii\helpers\Html::activeHiddenInput($ProjectApp, 'id_app'); ?>
				<?= \yii\helpers\Html::activeHiddenInput($ProjectApp, 'id'); ?>
			</td>
			<td class="enabled">
				<label class="switch-light switch-android " onclick="">
					<?= \yii\helpers\Html::checkBox('ProjectApp[enabled]', !$ProjectApp->isNewRecord)?>
					<span>
						Status
						<span>Off</span>
						<span>On</span>
					</span>

					<a class="btn btn-primary"></a>
				</label>

			</td>
			<td class="save">
				<?= Html::button('Save', ['class'=>'btn btn-success project-app_save']) ?>
			</td>
		</tr>
		</tbody>
	</table>
<?php ActiveForm::end() ?>


<style>

	table.table.app-table th.save{
		width: 15%;
	}
	table.table.app-table td.category{
		width: 40%;
	}
	table.table.app-table td.enabled{
		width: 25%;
	}
	table.table.app-table td.save{
		width: 20%;
	}


	/*
	Disabled
	*/
	table.table.app-table tr.disabled{
		color: #AAA;
		background-color: #FAFAFA;
	}

</style>

<?php $this->registerJs('
	$(".project-app_save").hide();
	$(".project-app_form input").change(function(){
	  $(this).closest("form").find(".project-app_save").show();
	});
') ?>