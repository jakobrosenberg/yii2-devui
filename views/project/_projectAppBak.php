<?php
/**
 * var $model \Simpletree\devui\models\App
 * Created by Jakob
 * Date: 23-01-14
 * Time: 11:51
 */

use yii\widgets\ActiveForm;
use Simpletree\devui\models\ProjectApp;
use yii\helpers\Html;

if(!$ProjectApp = $model->projectApp){
	$ProjectApp = new ProjectApp();
}

?>




<?php ActiveForm::begin() ?>
	<table class="table app-table">
		<tbody>
		<?php if(!$index): ?>
			<tr>
				<th>Name</th>
				<th>Category</th>
				<th>Enabled</th>
				<th>Save</th>
			</tr>
		<?php endif?>
		<tr>
			<td>
				<div class="app-table-name"><?= $model->nameRecursive ?></div>
			</td>
			<td><?= \yii\helpers\Html::activeTextInput($ProjectApp, 'category', ['class'=>'form-control', 'placeholder'=>$model->categoryRecursive]); ?></td>
			<td>
				<?php if($ProjectApp->isNewRecord): ?>
					<?= Html::button('Disabled', ['class'=>'btn btn-danger']) ?>

				<?php else: ?>

					<?= Html::button('Enabled', ['class'=>'btn btn-success']) ?>
				<?php endif; ?>
			</td>
			<td>
				<?= Html::button('Save', ['class'=>'btn btn-success']) ?>
			</td>
		</tr>
		</tbody>
	</table>
<?php ActiveForm::end() ?>


<style>

	.app-table-name{
		width: 200px;
	}

</style>