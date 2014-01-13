<?php
/**
 * Created by Jakob
 * Date: 05-12-13
 * Time: 23:39
 *
 * @var \yii\web\View $this
 */

use yii\helpers\Html;


?>
<?= Html::beginForm() ?>
	<h1>Uninstall</h1>
	<h4>Are you sure you wish to remove the database tables. All your projects will be lost.</h4>
	<?= Html::submitButton('Yes!', ['class'=>'btn btn-danger', 'value'=>'confirm', 'name'=>'confirm']) ?>
<?= Html::endForm() ?>

