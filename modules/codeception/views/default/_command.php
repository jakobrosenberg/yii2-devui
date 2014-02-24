<?php

use yii\helpers\BaseHtml;
use yii\helpers\Html;

/**
 * Created by Jakob
 * Date: 21-02-14
 * Time: 19:42
 * @var Simpletree\devui\models\CommandHistory $model
 * @var yii\web\View $this
 */ ?>






<div class="command-group">
	<div class="row">
		<div class="col-md-8">
			<?= Html::tag("span", $model->command, ['class' => 'command-entry']) ?>
		</div>
		<div class="col-md-4">
			<?= BaseHtml::a('', '#', ['class'=>'command-repeat glyphicon glyphicon-repeat']) ?>
			<?= BaseHtml::a('', '#', ['class'=>'command-edit glyphicon glyphicon-pencil']) ?>
			<?= BaseHtml::a('', '#', ['class'=>'toggle-result glyphicon glyphicon-eye-open']) ?>
			<?= BaseHtml::a('', '#', ['class'=>'command-favorite glyphicon glyphicon-heart']) ?>
		</div>

	</div>
	<div class="command-result" style="display:none">
		<pre><?= Html::encode($model->result) ?></pre>
	</div>
</div>



<?php $this->registerJs('
	$("a.toggle-result").click(function(){
		var a = $(this);
		$(this).parents(".command-group").find(".command-result").slideToggle("", function(el){
			if ($(this).is(":visible")) {
				a.toggleClass("glyphicon-eye-open glyphicon-eye-close");
			}else{
				a.toggleClass("glyphicon-eye-close glyphicon-eye-open");
			}
		});
	});

	$("a.command-edit").click(function(){
		var text = ($(this).parents(".command-group").find(".command-entry").html());
		$("#commandhistory-command").val(text);
	});

	$("a.command-repeat").click(function(){
		var text = ($(this).parents(".command-group").find(".command-entry").html());
		$("#commandhistory-command").val(text);
		$("#commandhistory-command").parents("form").submit();;
	});
') ?>