<?php

    use common\models\Languages;
    use mihaildev\elfinder\InputFile;
    use yii\bootstrap4\ActiveForm;
    use yii\bootstrap4\Tabs;
    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model common\models\ResourcesLocalization */
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
                'content' => $form->field($model, "title{$code}")->textInput(['maxlength' => true]),
                'active'  => $active
            ];
        }

        echo Tabs::widget([
            'items' => $data
        ]);
    ?>

    <?= $form->field($model, 'img')->widget(InputFile::class, [
        'language'      => 'ru',
        'filter'        => 'image',
        'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        'options'       => ['class' => 'form-control'],
        'buttonOptions' => ['class' => 'btn btn-success'],
        'multiple'      => false
    ]); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
