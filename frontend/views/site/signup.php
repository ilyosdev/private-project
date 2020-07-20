<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$form =ActiveForm::begin(['id'=> 'form-signup']) ?>

<?=$form->field($model, 'phone', [
    'template' =>
        '
            <label>
                <p class="label-txt">ENTER YOUR PHONE</p>            
            </label>
                      {input}
            <div class="line-box">
                <div class="line"></div>
            </div>
              {error}
              {hint}
        
        ',
    'inputTemplate'=>'<input id="signupform-phone" type="number" class="input" name="SignupForm[phone]">'

])->label(false)?>

<?=$form->field($model, 'name',[
    'template' =>
        '
         <label>
                     <p class="label-txt">ENTER YOUR NAME</p>

         </label>
         {input}
        <div class="line-box">
            <div class="line"></div>
        </div>
        {error}
        {hint}
        
    ',
    'inputTemplate'=>'<input id="signupform-name" type="text" class="input" name="SignupForm[name]">'

])->label(false)?>
<?=$form->field($model, 'password',[
    'template' =>
        '
         <label >
            <p class="label-txt">ENTER YOUR PASSWORD</p>        
         </label>

         {input}
        <div class="line-box">
            <div class="line"></div>
        </div>
           {error}
        {hint}
        ',
    'inputTemplate'=>'<input id="signupform-password" type="password" class="input" name="SignupForm[password]">'

])->input('password')->label(false)?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>
