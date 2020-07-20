<?php

    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model common\models\Localizations */

    $this->title = Yii::t('app', 'Create Localizations');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Localizations'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="cm-form">
    <div class="cm-form-header"><?= Html::encode($this->title) ?></div>
    <div class="cm-form-body">
        <div class="localizations-create">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>