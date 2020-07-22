<?php

    use common\models\Languages;
    use mihaildev\ckeditor\CKEditor;
    use mihaildev\elfinder\ElFinder;
    use yii\bootstrap4\ActiveForm;
    use yii\bootstrap4\Tabs;
    use yii\helpers\Html;

    mihaildev\elfinder\Assets::noConflict($this);


    /* @var $this yii\web\View */
    /* @var $model common\models\Pages */
    /* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php

        $data = [];
        $x = 0;
        foreach (Languages::getList() as $language) {

            if ($x == 0) {
                $active = true;
            } else {
                $active = false;
            }
            $x++;

            $code = "";

            if ($language['web_code'] != 'uz') {
                $code = "_" . $language['web_code'];
            }

            $data[] = [
                'label'   => $language['title'],
                'content' => $form->field($model, "title{$code}")->textInput(['maxlength' => true]) .
                    $form->field($model, "content{$code}")->widget(CKEditor::class, [
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder')
                    ]),
                'active'  => $active
            ];
        }

        echo Tabs::widget([
            'items' => $data
        ]);
    ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->radioList([
        -1 => Yii::t('app', "Қоралама"),
        0  => Yii::t('app', "Чоп қилишга таёр"),
        1  => Yii::t('app', "Чоп этилган"),
    ], [
        'class' => 'status_list'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
