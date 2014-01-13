<?php
/**
 * @var \yii\web\View $this
 * @var string $content
 */
$asset = yii\gii\GiiAsset::register($this);
?>

<?php $this->beginContent('@Simpletree/devui/views/layouts/main.php') ?>
<div class="container">
	<?= $content ?>
</div>
<?php $this->endContent(); ?>