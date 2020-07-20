<?php

    use common\models\Languages;
    use mihaildev\ckeditor\CKEditor;
    use mihaildev\elfinder\ElFinder;
    use yii\bootstrap4\ActiveForm;
    use yii\bootstrap4\Tabs;
    use yii\helpers\Html;

    mihaildev\elfinder\Assets::noConflict($this);

    /* @var $this yii\web\View */
    /* @var $model common\models\Postlang */
    /* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="uz-lat-rules-form">

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
                'content' =>
                    $form->field($model, "title{$code}")->textInput(['maxlength' => true]) .
                    $form->field($model, "content{$code}")->widget(CKEditor::className(), [
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['language' => 'ru']),
                    ])->label(Yii::t('app', 'Content')),
                'active'  => $active
            ];
        }

        echo Tabs::widget([
            'items' => $data
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
