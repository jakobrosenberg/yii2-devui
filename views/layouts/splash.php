<?php
/**
 * @var $this \yii\web\View
 * Created by Jakob
 * Date: 29-11-13
 * Time: 11:20
 */ ?>






<?php $this->beginContent('@Simpletree/devui/views/layouts/page.php') ?>
<div class="container">
	<?php echo \frontend\widgets\Alert::widget()?>
	<?php echo $content; ?>
</div>
<?php $this->endContent() ?>

