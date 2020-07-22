<?php

    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model common\models\search\NewsSearch */
    /* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="search-form" id="search-form">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'img') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'content') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'language') ?>

    <?php // echo $form->field($model, 'is_slider') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'view_counter') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
