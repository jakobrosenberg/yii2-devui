<?php
/**
 * @var $this \yii\web\View
 * Created by Jakob
 * Date: 29-11-13
 * Time: 11:20
 */ ?>

<?php
use yii\bootstrap\ButtonGroup;
use yii\bootstrap\Button;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
;?>


<?php $module = \Simpletree\devui\components\Helper::module('Simpletree\devui\Module', $this->context->module); ?>
<?php $path = "/$module->uniqueId/"; ?>
<?php $asset = \Simpletree\devui\DevuiAsset::register($this) ?>


<?php $this->beginContent('@Simpletree/devui/views/layouts/page.php') ?>

<?php NavBar::begin([
	'brandLabel' => 'Yii2 DevUI',
	'brandUrl' => [$path.'dashboard/index'],
	'options' => ['class' => 'devui navbar-inverse navbar-fixed-top'],
]) ?>
<?= Nav::Widget([
	'options' => ['class' => 'nav navbar-nav'],
	'encodeLabels' => false,
	'items' => [
		['label'=>'<span class=""></span>  Tests', 'url'=>[$path.'tests/index']],
		['label'=>'<span class="glyphicon glyphicon-warning-sign"></span>  Report', 'url'=>[$path.'report/index']],
		['label'=>'<span class="glyphicon glyphicon-stats"></span>  Coverage', 'url'=>[$path.'coverage/index']],
		['label'=>'<span class="glyphicon glyphicon-book"></span>  Db', 'items' => [
			['label'=>'Chive', 'url' => [$path.'db/chive']],
			['label'=>'DbNinja', 'url' => [$path.'db/dbninja']],
			['label'=>'Adminer', 'url' => [$path.'db/adminer']]
		]],
		['label'=>'<span class="glyphicon glyphicon-transfer"></span>  Migrations', 'url' => [$path.'migrations/index']],
		['label'=>'<span class="glyphicon glyphicon-wrench"></span> Gii', 'url' => [$path.'gii/default/index']],

	]
]) ?>
<?= Nav::Widget([
	'options' => ['class' => 'nav navbar-nav navbar-right'],
	'encodeLabels' => false,
	'items' => [
		['label'=>'<span class=""></span> ' . $module->project->name, 'items' => \Simpletree\devui\models\Project::getNavigationData()],
		['label'=> '<span class="glyphicon glyphicon-cog"></span> ']
]
]); ?>
<?php NavBar::end() ?>
<div class="container">
	<?php echo \yii\widgets\Breadcrumbs::widget(array(
		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : array(),
	)); ?>
	<?php echo \frontend\widgets\Alert::widget()?>
	<?php echo $content; ?>
</div>
<?php $this->endContent() ?>

