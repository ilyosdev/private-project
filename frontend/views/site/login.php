<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$form = ActiveForm::begin(['id' => 'form-login']);

?>

<?= $form->field($model, 'phone', [
    'template' => '
        <label> <p class="label-txt">ENTER YOUR PHONE</p> </label>
        {input}
        <div class="line-box">
               <div class="line"></div>
        </div>
        {error}
        {hint}
    ',
    'inputTemplate' => '<input id="loginform-phone" type="number" class="input" name="LoginForm[phone]">'
]) ?>


<?= $form->field($model, 'password', [
    'template' => '
        <label> <p class="label-txt">ENTER YOUR PHONE</p> </label>
        {input}
        <div class="line-box">
               <div class="line"></div>
        </div>
        {error}
        {hint}
    ',
    'inputTemplate' => '<input id="loginform-password" type="password" class="input" name="LoginForm[password]">'
])?>

<?= $form->field($model, 'rememberMe')->checkbox() ?>

<div style="color:#999;margin:1em 0">
    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
    <br>
    Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
</div>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>

