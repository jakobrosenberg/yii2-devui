<?php
/**
 * Created by Jakob
 * Date: 05-12-13
 * Time: 23:39
 *
 * @var \yii\web\View $this
 */

use yii\helpers\Html;


?>
<?= Html::beginForm() ?>
<div class="jumbotron">
	<h1>Welcome to Yii2 Developer UI</h1>

	<p>Would you like to add the required database tables?</p>
	<?= Html::submitButton('Yes please', ['class'=>'btn btn-primary', 'data-toggle'=>'modal', 'data-target'=>'#project_name_modal']) ?>


</div>


<?php \yii\bootstrap\Modal::begin([
	'header' => 'Please enter the name of your first project.',
	'footer' => Html::submitButton('Let\'s go!', ['class' => 'btn btn-primary', 'name' => 'confirm', 'value' => 1]),
	'id' => 'project_name_modal',
]); ?>
<?= Html::textInput('project_name', 'My first project') ?>
<?php \yii\bootstrap\Modal::end(); ?>


<?= Html::endForm() ?>

