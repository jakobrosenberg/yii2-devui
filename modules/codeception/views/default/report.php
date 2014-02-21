<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * Created by Jakob
 * Date: 29-11-13
 * Time: 09:09
 */?>

<?php $asset = \Simpletree\devui\DevuiAsset::register($this) ?>




<!--Submit command-->
<?php $form = \yii\widgets\ActiveForm::begin() ?>
<?= $form->field($model, 'command') ?>
<?= $form->field($model, 'id_app') ?>
<?= $form->field($model, 'id_project') ?>
<?= Html::submitButton() ?>
<?php $form->end(); ?>
<!--/Submit command-->


<?php if($result):?>
<code>
<?= $result ?>
</code>
<?php endif; ?>

<!--FlexIframe-->
<?php if(file_exists($file)): ?>
	<h6>Run at: <?= \Yii::$app->formatter->asDatetime(filemtime($file)) ?></h6>
<?= \Simpletree\devui\widgets\FlexIframe\FlexIframe::widget([
		'url'=> $asset->baseUrl."/loader.php".$file,
		'bookmarks' => false
	]) ?>
<?php endif ?>
<!--/FlexIframe-->
