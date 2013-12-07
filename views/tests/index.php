<?php
/**
 * @var yii\base\View $this
 * Created by Jakob
 * Date: 29-11-13
 * Time: 09:09
 */

use yii\helpers\Html;
use Simpletree\devui\models\Command;

?>
<?php print_r($_POST) ?>
<?= Html::beginForm() ?>

	<?= Html::radioList('test_command', false, array_flip($this->context->module->commands)) ?>

<?= Html::submitButton() ?>

<?= Html::endForm() ?>


<?php

?>