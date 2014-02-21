<?php
/**
 * @var yii\base\View $this
 * Created by Jakob
 * Date: 29-11-13
 * Time: 09:09
 */ ?>


<?php $asset = \Simpletree\devui\DevuiAsset::register($this) ?>





<?php if(file_exists($file)): ?>
	<h4><?= Yii::$app->formatter->asDatetime(filemtime($file)) ?></h4>
	<?= \Simpletree\devui\widgets\FlexIframe\FlexIframe::widget([
		'url'=> $asset->baseUrl."/loader.php".$file,
		'interval' => 0
	]) ?>
<?php endif ?>