<?php

    use common\models\Languages;
    use mihaildev\ckeditor\CKEditor;
    use mihaildev\elfinder\ElFinder;
    use mihaildev\elfinder\InputFile;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\ArrayHelper;
    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model common\models\News */
    /* @var $form yii\bootstrap4\ActiveForm */

    if ($model->isNewRecord) {
        $model->date = date("Y-m-d H:i:s");
    }
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::class, [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder')
    ]); ?>

    <?= $form->field($model, 'img')->widget(InputFile::class, [
        'language'      => 'ru',
        'filter'        => 'image',
        'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        'options'       => ['class' => 'form-control'],
        'buttonOptions' => ['class' => 'btn btn-success'],
        'multiple'      => false
    ]); ?>

    <?= $form->field($model, 'language')->dropDownList(ArrayHelper::map(Languages::getList(), 'web_code', 'title')) ?>

    <?= $form->field($model, 'is_slider')->dropDownList([
        1 => Yii::t('app', "Yes"),
        0 => Yii::t('app', "No"),
    ]) ?>

    <?= $form->field($model, 'status')->radioList([
        -1 => Yii::t('app', "Қоралама"),
        0  => Yii::t('app', "Чоп қилишга таёр"),
        1  => Yii::t('app', "Чоп этилган"),
    ], [
        'class' => 'status_list'
    ]) ?>


    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
