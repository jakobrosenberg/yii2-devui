<?php
/**
 * Created by Jakob
 * Date: 22-01-14
 * Time: 19:36
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?= \yii\widgets\ListView::widget([
	'dataProvider' => $dataProvider,
	'itemView' => '_projectApp',


]) ?>

