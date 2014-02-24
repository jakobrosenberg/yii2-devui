<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * Created by Jakob
 * Date: 29-11-13
 * Time: 09:09
 */?>

<?php $asset = \Simpletree\devui\DevuiAsset::register($this) ?>

<div ng-controller="CommandListCtrl">
	<div>
		Count: {{commands.items.length}}
	</div>

	<div>
		<div ng-repeat="command in commands.items">
			<strong>{{command.command}}</strong>
			<span class="hidden">{{command.result}}</span>
		</div>
	</div>
</div>



<!--Past commands-->

	<?= \Simpletree\devui\widgets\ListView::widget([
		'dataProvider' => $commandHistory,
		'itemView' => '_command',
		'itemOptions' => [
			'tag' => 'li',
			'class' => 'list-group-item'
		],
		'layout' => "{summary}\n<ul class='list-group'>{items}</ul>\n{pager}",
		'reverse' => true
	]) ?>

<!--/Past commands-->


<!--Submit command-->
<?php $form = \yii\widgets\ActiveForm::begin() ?>
<?= $form->field($model, 'command') ?>
<?= Html::activeHiddenInput($model, 'id_app') ?>
<?= Html::activeHiddenInput($model, 'id_project') ?>
<?= Html::submitButton() ?>
<?php $form->end(); ?>
<!--/Submit command-->


<!--FlexIframe-->
<?php if(file_exists($file)): ?>
	<h6>Run at: <?= \Yii::$app->formatter->asDatetime(filemtime($file)) ?></h6>
<?= \Simpletree\devui\widgets\FlexIframe\FlexIframe::widget([
		'url'=> $asset->baseUrl."/loader.php".$file,
		'bookmarks' => false
	]) ?>
<?php endif ?>
<!--/FlexIframe-->
