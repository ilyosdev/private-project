<?php

    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model common\models\Settings */
    /* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="settings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'setting_key')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'setting_value')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
