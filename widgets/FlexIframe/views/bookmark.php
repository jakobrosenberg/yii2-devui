<?php
/**
 * @var $this \yii\web\View
 * Created by Jakob
 * Date: 08-01-14
 * Time: 20:04
 */

use yii\helpers\Html;

$DevuiModule = \Simpletree\devui\components\Helper::devuiModule()
?>


<ul class="bookmarks list-group">
	<?= \Simpletree\devui\widgets\FlexIframe\BookmarkList::widget([
		'bookmarks' => $bookmarks
	]) ?>
</ul>

<?= Html::beginForm(["/$DevuiModule->uniqueId/default/flexiframe", 'action'=>'save'], 'post', ['class'=>'iframe_bookmark_form', 'role'=>'form']); ?>

<div class="row">
	<div class="col-xs-7 col-sm-8 col-md-9">
		<?= Html::activeTextInput($Bookmark, 'name', ['class'=>'form-control']); ?>
		<?= Html::activeHiddenInput($Bookmark, 'url', ['class'=>'form-control']); ?>
		<?= Html::activeHiddenInput($Bookmark, 'default', ['class'=>'form-control']); ?>
		<?= Html::activeHiddenInput($Bookmark,'id_app', ['class'=>'form-control']); ?>
	</div>

	<div class="col-xs-5 col-sm-4 col-md-3">
		<div class="btn-group">
			<?= Html::submitButton('Bookmark', ['class'=>'bookmark_add btn btn-primary', 'name'=>'Bookmark[default]', 'value'=>false]); ?>
			<?= Html::submitButton('<span class="glyphicon glyphicon-star"></span>', ['class'=>'bookmark_add btn btn-primary', 'name'=>'Bookmark[default]', 'value'=>1]); ?>
		</div>
	</div>
</div>

<?= Html::endForm(); ?>
<br>

<?php $this->registerJs('



	function bookmarkFunc(){
		$(".bookmark_delete").click(function(){
			$.ajax(this.href);
			$(this).parent().fadeOut().remove();
			return false;
		});

		$("[name=\"Bookmark[default]\"]").click(function(el){
			$(".iframe_bookmark_form input[name=\"Bookmark[default]\"]").val(this.value);
		});

		$(".iframe_bookmark_link").click(function(){


		$("#devui_iframe").attr("src", $(this).attr("href"));
			return false;
		})

		$(".list-group-item.highlight").hide().fadeIn();
	}
	bookmarkFunc();

	$(".iframe_bookmark_form").submit(function(){
		$.post(this.action, $(this).serialize(), function(data){
			$(".bookmarks").html(data);
			bookmarkFunc();
		});
		return false;
	});




') ?>