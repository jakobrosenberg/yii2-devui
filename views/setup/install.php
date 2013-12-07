<?php
/**
 * Created by Jakob
 * Date: 05-12-13
 * Time: 23:39
 */

use yii\helpers\Html;
use yii\bootstrap\Button;
?>

<h1>Welcome to Yii2 Developer UI</h1>

<h4>Would you like to add the required database tables?</h4>

<?php echo Html::beginForm() ?>
<?php echo Html::submitButton('Accept', ['class'=>'btn btn-primary', 'name'=>'confirm', 'value'=>1]) ?>
<?php echo Html::endForm() ?>
