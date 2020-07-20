<?php

    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model common\models\Localizations */
    /* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="localizations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'es')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'de')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
