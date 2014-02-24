<?php
use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 * @var string $content
 */

$this->registerAssetBundle('\Simpletree\devui\DevuiAsset');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en" ng-app="devuiApp">
<head>
	<meta charset="utf-8"/>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
