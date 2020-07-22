<?php

/* @var $this yii\web\View */
/* @var $model common\models\Payment */
/* @var $form yii\bootstrap4\ActiveForm */

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;


$this->title = 'Chek jo`natish';
?>
<div class="payment-create">

    <h1 class="mt-4"><?= Html::encode($this->title) ?></h1>


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'img')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
