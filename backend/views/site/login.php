<?php

    /* @var $this yii\web\View */
    /* @var $form yii\bootstrap4\ActiveForm */

    /* @var $model LoginForm */

    use common\models\LoginForm;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Html;

    $this->title = 'Login';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="form-wrapper">


    <div id="logo">
        <h1>Riddin.uz</h1>
    </div>
    <!-- ./ logo -->

    <!-- form -->
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <?= $form->field($model, 'phone')->input('number',['autofocus' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'rememberMe')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Авторзиция', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>