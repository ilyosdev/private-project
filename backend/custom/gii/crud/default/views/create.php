<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Create ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cm-form">
	<div class="cm-form-header"><?= "<?= " ?>Html::encode($this->title) ?></div>
	<div class="cm-form-body">
		<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-create">
			<?= "<?= " ?>$this->render('_form', [
				'model' => $model,
			]) ?>
		</div>
	</div>
</div>