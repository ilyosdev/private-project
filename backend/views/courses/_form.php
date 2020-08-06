<?php

    use mihaildev\ckeditor\CKEditor;
    use mihaildev\elfinder\ElFinder;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    /* @var $this yii\web\View */
    /* @var $model common\models\Courses */
    /* @var $form yii\widgets\ActiveForm */
?>

<div class="courses-form">
    <?= Html::errorSummary($model, ['encode' => false]) ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'slug')->textInput() ?>

    <!--    --><? //= $form->field($model, 'description')->textarea() ?>
    <?= $form->field($model, 'description')->widget(CKEditor::class, [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder'),
    ]); ?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <?= $form->field($model, 'image')->fileInput(); ?>

    <?= $form->field($model, 'status')->dropDownList(['0' => 'Not active', '1' => 'Active']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
