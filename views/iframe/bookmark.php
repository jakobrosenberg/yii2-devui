<?php
/**
 * Created by Jakob
 * Date: 08-01-14
 * Time: 20:04
 */

use yii\helpers\Html;

$model = new \Simpletree\devui\models\base\Bookmark();
$model->id_app = $this->context->moduleName;

?>

<?= Html::beginForm(["/$module->uniqueId/bookmark/save"], 'post', ['class'=>'iframe_bookmark', 'role'=>'form']); ?>

<div class="row">
	<div class="col-xs-7 col-sm-8 col-md-9">
		<?= Html::activeTextInput($model, 'name', ['class'=>'form-control']); ?>
		<?= Html::activeTextInput($model, 'url', ['class'=>'form-control']); ?>
		<?= Html::activeTextInput($model,'id_app', ['class'=>'form-control']); ?>
	</div>

	<div class="col-xs-5 col-sm-4 col-md-3">
		<?= Html::submitButton('<span class="glyphicon glyphicon-star"></span> Bookmark', ['class'=>' btn btn-primary btn-block']); ?>
	</div>






</div>

<?= Html::endForm(); ?>