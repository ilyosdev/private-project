<?php

    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model common\models\search\LocalizationsSearch */
    /* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="search-form" id="search-form">

    <?php $form = ActiveForm::begin([
        'action'  => ['index'],
        'method'  => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ru') ?>

    <?= $form->field($model, 'uz') ?>

    <?= $form->field($model, 'en') ?>

    <?= $form->field($model, 'oz') ?>

    <?php // echo $form->field($model, 'zh') ?>

    <?php // echo $form->field($model, 'ar') ?>

    <?php // echo $form->field($model, 'es') ?>

    <?php // echo $form->field($model, 'fr') ?>

    <?php // echo $form->field($model, 'de') ?>

    <?php // echo $form->field($model, 'code') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
