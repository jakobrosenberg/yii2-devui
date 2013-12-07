<?php
/**
 * @var yii\web\View $this
 * Created by Jakob
 * Date: 29-11-13
 * Time: 09:09
 */ ?>

<?php use yii\helpers\Html; ?>

<?php $asset = \Simpletree\devui\DevuiAsset::register($this) ?>




<?php Html::submitButton() ?>



<?php if(file_exists($file)): ?>
<h4><?= Yii::$app->formatter->asDatetime(filemtime($file)) ?></h4>
<?= \Simpletree\devui\FlexIframe::widget(['url'=> $asset->baseUrl."/loader.php".$file]) ?>
<?php endif ?>