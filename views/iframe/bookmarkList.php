<?php
/**
 * Created by Jakob
 * Date: 20-01-14
 * Time: 17:18
 */

use yii\helpers\Html;

?>

<?php $DevuiModule  = \Simpletree\devui\components\Helper::devuiModule(); ?>


	<?php foreach($bookmarks AS $BookmarkItem): ?>

		<li class="list-group-item <?= isset($model) && $BookmarkItem->id == $model->id ? 'highlight' : '' ?>">
			<?= Html::a('x', ["/$DevuiModule->uniqueId/bookmark/delete", 'id'=>$BookmarkItem->id], ['class'=>'bookmark_delete close']) ?>
			<?php if($BookmarkItem->default): ?>
				<span class="button glyphicon glyphicon-home"></span>
			<?php endif ?>
			<?= Html::a($BookmarkItem->name, $BookmarkItem->url, ['class'=>'iframe_bookmark_link']) ?>
		</li>
	<?php endforeach ?>
