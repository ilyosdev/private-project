<?php

    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model common\models\UzLatRules */
    /* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="uz-lat-rules-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uz_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oz_value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
